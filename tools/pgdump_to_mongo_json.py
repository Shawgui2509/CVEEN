#!/usr/bin/env python3
"""
Convert a PostgreSQL dump containing COPY ... FROM stdin sections
into JSON files ready for MongoDB Compass import.

Usage:
  python tools/pgdump_to_mongo_json.py --input dump.sql --outdir mongo_export
"""

from __future__ import annotations

import argparse
import csv
import json
import re
from pathlib import Path
from typing import Dict, List, Optional

COPY_HEADER_RE = re.compile(
    r"^COPY\s+([A-Za-z0-9_]+)\.([A-Za-z0-9_]+)\s*\((.*?)\)\s+FROM\s+stdin;\s*$"
)
INT_RE = re.compile(r"^-?\d+$")
FLOAT_RE = re.compile(r"^-?\d+\.\d+$")


def parse_args() -> argparse.Namespace:
    parser = argparse.ArgumentParser()
    parser.add_argument("--input", required=True, help="Path to PostgreSQL dump .sql file")
    parser.add_argument("--outdir", required=True, help="Output directory for generated JSON files")
    return parser.parse_args()


def split_columns(raw: str) -> List[str]:
    return [part.strip() for part in raw.split(",") if part.strip()]


def cast_value(value: str):
    if value == r"\N":
        return None

    if value == "t":
        return True
    if value == "f":
        return False

    if INT_RE.match(value):
        try:
            return int(value)
        except ValueError:
            return value

    if FLOAT_RE.match(value):
        try:
            return float(value)
        except ValueError:
            return value

    return value


def parse_copy_rows(lines: List[str], columns: List[str]) -> List[dict]:
    docs: List[dict] = []

    reader = csv.reader(lines, delimiter="\t", quotechar='"', escapechar='\\')
    for row in reader:
        if len(row) != len(columns):
            raise ValueError(
                f"Row has {len(row)} values but expected {len(columns)} for columns {columns}. Row={row}"
            )

        doc = {col: cast_value(val) for col, val in zip(columns, row)}
        docs.append(doc)

    return docs


def convert_dump(input_path: Path) -> Dict[str, List[dict]]:
    content = input_path.read_text(encoding="utf-8", errors="replace").splitlines()

    tables: Dict[str, List[dict]] = {}
    i = 0
    n = len(content)

    while i < n:
        line = content[i].strip()
        match = COPY_HEADER_RE.match(line)

        if not match:
            i += 1
            continue

        schema = match.group(1)
        table = match.group(2)
        columns = split_columns(match.group(3))
        key = f"{schema}.{table}"

        i += 1
        block_lines: List[str] = []

        while i < n:
            current = content[i]
            if current.strip() == r"\.":
                break
            block_lines.append(current)
            i += 1

        if i >= n:
            raise ValueError(f"Unterminated COPY block for {key}")

        docs = parse_copy_rows(block_lines, columns)
        tables[key] = docs

        i += 1

    return tables


def write_json_files(tables: Dict[str, List[dict]], outdir: Path) -> None:
    outdir.mkdir(parents=True, exist_ok=True)

    manifest = []
    for table_name, docs in tables.items():
        filename = f"{table_name}.json"
        file_path = outdir / filename
        file_path.write_text(json.dumps(docs, ensure_ascii=False, indent=2), encoding="utf-8")
        manifest.append({"table": table_name, "file": filename, "count": len(docs)})

    (outdir / "manifest.json").write_text(
        json.dumps(manifest, ensure_ascii=False, indent=2), encoding="utf-8"
    )


def main() -> None:
    args = parse_args()
    input_path = Path(args.input)
    outdir = Path(args.outdir)

    if not input_path.exists():
        raise FileNotFoundError(f"Input file not found: {input_path}")

    tables = convert_dump(input_path)
    write_json_files(tables, outdir)

    print("Done.")
    print(f"Source: {input_path}")
    print(f"Output directory: {outdir}")
    for table, docs in tables.items():
        print(f"- {table}: {len(docs)} document(s)")


if __name__ == "__main__":
    main()
