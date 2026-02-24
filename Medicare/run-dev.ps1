Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

Write-Host "[Medicare] Verification des dependances..." -ForegroundColor Cyan
if (-not (Test-Path "vendor\autoload.php")) {
    Write-Host "[Medicare] vendor manquant, installation Composer..." -ForegroundColor Yellow
    composer install
}

Write-Host "[Medicare] Nettoyage du cache..." -ForegroundColor Cyan
php bin/console cache:clear

Write-Host "[Medicare] Application des migrations..." -ForegroundColor Cyan
php bin/console doctrine:migrations:migrate --no-interaction

Write-Host "[Medicare] Demarrage serveur local..." -ForegroundColor Green
Write-Host "Ouvre ensuite: http://127.0.0.1:8000/login" -ForegroundColor Green

# Garde le serveur au premier plan pour eviter l'arret automatique
php -S 127.0.0.1:8000 -t public
