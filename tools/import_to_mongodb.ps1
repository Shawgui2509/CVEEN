param(
    [string]$DbName = "tp_cven",
    [string]$ExportDir = "mongo_export"
)

$ErrorActionPreference = "Stop"

if (-not $env:MONGODB_URI) {
    throw "MONGODB_URI is not set. Define it in your current terminal before running this script."
}

if (-not (Get-Command mongoimport -ErrorAction SilentlyContinue)) {
    throw "mongoimport is not installed or not in PATH. Install MongoDB Database Tools first."
}

$usersFile = Join-Path $ExportDir "public.users.json"
$reservationsFile = Join-Path $ExportDir "public.reservation.json"
$typesFile = Join-Path $ExportDir "public.typelogement.json"

foreach ($file in @($usersFile, $reservationsFile, $typesFile)) {
    if (-not (Test-Path $file)) {
        throw "Missing file: $file"
    }
}

Write-Host "Import users..."
mongoimport --uri "$env:MONGODB_URI" --db "$DbName" --collection "users" --file "$usersFile" --jsonArray

Write-Host "Import reservations..."
mongoimport --uri "$env:MONGODB_URI" --db "$DbName" --collection "reservations" --file "$reservationsFile" --jsonArray

Write-Host "Import typelogements..."
mongoimport --uri "$env:MONGODB_URI" --db "$DbName" --collection "typelogements" --file "$typesFile" --jsonArray

Write-Host "Done."
Write-Host "Run these index commands in mongosh/Compass shell:"
Write-Host "db.users.createIndex({ id_user: 1 }, { unique: true })"
Write-Host "db.users.createIndex({ email: 1 }, { unique: true })"
Write-Host "db.reservations.createIndex({ id_reservation: 1 }, { unique: true })"
Write-Host "db.reservations.createIndex({ id_user: 1 })"
Write-Host "db.typelogements.createIndex({ typelogement: 1 }, { unique: true })"
