PostgreSQL dump -> MongoDB Compass

Security first

- Do not commit credentials in files.
- If a URI/password was shared in chat or code, rotate the database user password in MongoDB Atlas.
- Use an environment variable for local imports.

1) Convert SQL dump to JSON files

From project root:

python tools/pgdump_to_mongo_json.py --input path/to/dump.sql --outdir mongo_export

This creates:
- mongo_export/public.users.json
- mongo_export/public.reservation.json
- mongo_export/public.typelogement.json
- mongo_export/mon_schema.users.json
- mongo_export/manifest.json

2) Import in MongoDB Compass

Create database (example): tp_cven
Create collections:
- users
- reservations
- typelogements
- mon_schema_users (optional, this one is empty in your sample)

Import JSON files:
- users <- public.users.json
- reservations <- public.reservation.json
- typelogements <- public.typelogement.json

Compass steps per collection:
- Open collection
- Click Add Data
- Import File
- Select JSON
- Pick the matching generated file

Alternative: import with mongoimport (Atlas URI)

In PowerShell (same terminal session):

setx MONGODB_URI "YOUR_MONGODB_ATLAS_URI"
$env:MONGODB_URI = "YOUR_MONGODB_ATLAS_URI"
./tools/import_to_mongodb.ps1 -DbName tp_cven -ExportDir mongo_export

3) Add indexes (recommended)

In mongosh (or Compass shell):

db.users.createIndex({ id_user: 1 }, { unique: true })
db.users.createIndex({ email: 1 }, { unique: true })
db.reservations.createIndex({ id_reservation: 1 }, { unique: true })
db.reservations.createIndex({ id_user: 1 })
db.typelogements.createIndex({ typelogement: 1 }, { unique: true })

4) Optional relation style in MongoDB

Keep PostgreSQL keys as fields:
- reservations.id_user references users.id_user
- reservations.typelogement references typelogements.typelogement

No foreign key constraints are enforced automatically in MongoDB.

5) Optional date conversion (if needed)

If date fields are imported as strings, convert them:

db.users.updateMany(
  { date_naissance: { $type: "string" } },
  [{ $set: { date_naissance: { $toDate: "$date_naissance" } } }]
)

db.users.updateMany(
  { created_at: { $type: "string" } },
  [{ $set: { created_at: { $toDate: "$created_at" } } }]
)

db.users.updateMany(
  { updated_at: { $type: "string" } },
  [{ $set: { updated_at: { $toDate: "$updated_at" } } }]
)

db.reservations.updateMany(
  { datedebut: { $type: "string" } },
  [{ $set: { datedebut: { $toDate: "$datedebut" } } }]
)

db.reservations.updateMany(
  { datefin: { $type: "string" } },
  [{ $set: { datefin: { $toDate: "$datefin" } } }]
)
