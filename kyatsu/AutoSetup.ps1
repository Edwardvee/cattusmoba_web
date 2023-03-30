title "Auto-Instalador de Laravel"
echo @off
echo "Auto-Instalador de Laravel"
echo "Antes de proceder, asegurese que abrio este archivo"
echo "en el lugar exacto en donde esta ubicado en el repositorio web"
echo "No habra el archivo fuera del repositorio web"
$security = Read-Host -Prompt 'Escriba SI/NO'

if ($security -eq "SI") {
Echo "Primero se comprobara si composer esta instalado esta computadora. Por favor espere."
    if (!(Get-Command composer -errorAction SilentlyContinue)) {
	    echo "Composer no esta instalado en esta computadora, o si lo esta, no se pudo detectarlo. Abortando..."
	    goto :aborted:
    }
echo "Instalando programa. No cierre el programa hasta que finalize el proceso"
composer install
copy .env.example /tmp/
ren /tpm/.env.example .env
copy /tpm/.env /
rm -rf tpm
php artisan key:generate --no-interaction
php artisan cache:clear --no-interaction
php artisan view:clear --no-interaction
php artisan migrate --no-interaction
echo "Instalacion finalizada, avisa si hubo algun error o sigue sin funcionar"
echo "Acordate que el comando para iniciar es php artisan serve"
} else {
echo "Se ha abortado la instalacion del programa"
}
echo "El programa se cerrara"
pause
exit