#Al ejecutar este script te encuentras con el error:
# 'la ejecución de scripts está deshabilitada en este sistema'?
# Eso es debido a una directiva de seguridad de windows para evitar scripts maliciosos
# Puedes desactivar esa directiva con el siguiente comando en PowerShell:

# Set-ExecutionPolicy Unrestricted -Scope CurrentUser ​

# Con eso cualquier script powershell se puede ejecutar en tu computadora con tu usuario de windows, incluyendo este.
# Eso te dejara expuesto a riesgos de seguridad, asi que ejecuta el siguiente comando luego de haber ejecutado este script:

# Set-ExecutionPolicy Restricted -Scope CurrentUser ​

# Con eso reactivas la politica de seguridad


echo @off
$host.ui.RawUI.WindowTitle = "Auto-Instalador de Laravel"
Set-Variable PHP_VERSION -Option Constant -Value 8.1
Set-Variable COMPOSER_VERSION -Option Constant -Value 2.2
Set-Variable REPOSITORY_PATH -Option Constant $pwd
Set-Varible ADMIN_RIGHTS -Option Constant ([Security.Principal.WindowsPrincipal] ` [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator)



$path_enviroment = [Environment]::GetEnvironmentVariable("PATH", "Machine")
$path_enviroment += "C:\pRUEBA\TEST2\Composer\"


if ($path_enviroment -match "composer") {
    $path_position_start
    $path_position_end
    $position_start = $path_enviroment.indexOf("composer")
    #$position_end = $path_enviroment.lastIndexOf("composer")
    #$start_matched_character = $path_enviroment.indexOf("composer")
    for ($i = $position_start; $i -ge 0; $i--) {
        if (($path_enviroment.indexOf($i)) -eq ";") {
            $path_position_start = $i++;
            break
        }
    }
    for ($i = $position_start; $i -le ($path_enviroment | Measure-Object -Character); $i++) {
        if (($path_enviroment.indexOf($i)) -eq ";") {
            $path_position_end = $i--;
            break
        }
    }
    $extracted_string = $path_enviroment.Substring($path_position_start, $path_position_end)
    Write-Host $extracted_string -ForegroundColor Yellow
} else {
    throw "It doesnt matched"
}

throw "FIN"


Write-Host "Auto-Instalador de Laravel" -ForegroundColor Green
Write-Host "Antes de proceder, asegurese que abrio este archivo"-ForegroundColor Green
Write-Host "en el lugar exacto en donde esta ubicado en el repositorio web"-ForegroundColor Green
Write-Host "No habra el archivo fuera del repositorio web"-ForegroundColor Green
Write-Host "Version minima de PHP Requerida: " $PHP_VERSION -ForegroundColor Yellow
Write-Host "Version minima de Composer Requerida: " $COMPOSER_VERSION -ForegroundColor Yellow
if ((Read-Host -Prompt 'Desea proceder? Escriba SI/NO') -ne "SI") {
    throw "FATAL: Instalacion inicial abortada por el usuario"
}

function enviromentTest() {
    Write-Host "Verificando instalacion de PHP en el entorno" -ForegroundColor Green  
    if (Get-Command php) {
        if (!(php -v -lt $PHP_VERSION)) {
            throw "FATAL: La version de PHP instalada es inferior a la requerida. Version instalada:" + (php -v)
        } 
    }
    else {
        throw "FATAL: No se encontro la instalacion de PHP en este dispositivo"
    }
    Write-Host "La comprobacion de PHP fue un exito. Version de php instalada: " + (php -v) -ForegroundColor Green
    
}
enviromentTest

function setupComposer() {
    Write-Host "Verificando instalacion de composer en el entorno" -ForegroundColor Green
    if (!([bool](Get-Command composer -ErrorAction SilentlyContinue))) {
        Write-Host "WARNING: Composer no esta instalado y es obligatorio para el funcionamiento del programa. Si lo desea, puede instalarlo" -ForegroundColor Yellow
        if ((Read-Host -Prompt "Desea instalar composer? SI/NO") -ne "SI") {
            throw "FATAL: Composer no esta instalado en el entorno y el usuario rechazo explicitamente su instalacion"
        }
        else {
            Read-Host -Prompt "Para instalar composer se necesita que este script haya sido ejecutado con privilegios de administrador" -ForegroundColor Yellow
            if (!($ADMIN_RIGHTS)) {
                throw "FATAL: Se intento instalar composer sin privilegios de administrador"
            }
            else {
                $composer_directory = $env:ProgramData.toString() + "\composer\"
                if (Test-Path $composer_directory) {
                    Remove-Item $composer_directory -Recurse
                }
                md $composer_directory
                cd $composer_directory
                Write-Host "INFO: Directorio a instalar el composer: " + $composer_directory.toString() -ForegroundColor Cyan
                $expectedSignature = curl https://composer.github.io/installer.sig;
                curl -o composer-setup.php https://getcomposer.org/installer
                $file_hash = (Get-FileHash composer-setup.php -Algorithm SHA384 | Select-Object -ExpandProperty Hash).toLower()
                Write-Host "INFO: SHA384 esperado:" + $expectedSignature.toString() -ForegroundColor Cyan
                Write-host "INFO: SHA384 recibido:" + $file_hash.toString() -ForegroundColor Cyan
                if ($file_hash.toString() -ne $expectedSignature) {
                    throw "FATAL: El hash 384 del archivo de instalacion descargado no coincide con el provisto en el sitio web"
                }
                php composer-setup.php
                Remove-Item composer-setup.php
                Write-Host "Composer ha sido instalado correctamente, ahora falta fijar su variable de entorno" -ForegroundColor Green
                #Composer ya ha sido instalado, ahora debemos establecer su variable de entorno asi se puede ejecutar el comando desde todos lados
                $path_enviroment = [Environment]::GetEnvironmentVariable("PATH", "Machine")
                if ($path_enviroment -match "composer") {
                    $path_position_start
                    $path_position_end
                    $position_start = $path_enviroment.indexOf("composer")
                    #$position_end = $path_enviroment.lastIndexOf("composer")
                    #$start_matched_character = $path_enviroment.indexOf("composer")
                    for ($i = $position_start; $i -lt 0; $i--) {
                        if (($path_enviroment.indexOf($i)) -eq ";") {
                            $path_position_start = $i++;
                            break
                        }
                    }
                    for ($i = $position_start; $i -le ($path_enviroment | Measure-Object -Character); $i++) {
                        if (($path_enviroment.indexOf($i)) -eq ";") {
                            $path_position_end = $i--;
                            break
                        }
                    }
                    $extracted_string = $path_enviroment.Substring($path_position_start, $path_position_end)
                    Write-Host $extracted_string -ForegroundColor Yellow
                    throw "FIN"
                }
                Write-Host "INFO: Informacion de la variable PATH DE ENTORNO ACTUAL: " + $path_enviroment.toString -ForegroundColor Cyan
                $path_enviroment += $composer_directory
                #[Environment]::SetEnvironmentVariable("PATH", $path_enviroment, "Machine")
                Write-Host "Se ha establecido la variable de entorno para composer correctamente" -ForegroundColor Green
                cd $REPOSITORY_PATH
            }
        }
    }
    else {
        if ((composer --version) -lt $COMPOSER_VERSION) {
            throw "FATAL: La version de composer instalada es inferior a la requerida. Version instalada:" + (composer --version) 
        }
        Write-Host "La comprobacion de composer fue un exito. Version de composer instalada: " + (composer --version) -ForegroundColor Green 
    }
}

setupComposer

function testSQL() {
    while (!([bool](Get-Process mysqld -ErrorAction SilentlyContinue))) {
        Write-Host "El servicio MySQL/MariaDB no se encuentra en linea, por favor enciendalo" -ForegroundColor Yellow
        Read-Host -prompt "Ya inicio el servicio MySQL?"
    }
    Write-Host "El servicio MySQL/MariaDB ya se encuentra en linea" -ForegroundColor Green
}

testSQL

if ((Read-Host -prompt "Todas las comprobaciones han sido un exito, desea instalar y configurar el repositorio? SI/NO") -ne "SI") {
    throw "FATAL: Todas las comprobaciones fueron un exito pero el usuario rechazo la configuracion del repositorio"
}

Write-Host "Configurando sistema" -ForegroundColor Green
composer install
Copy-Item ($REPOSITORY_PATH.toString() + "\.env.example") -Destination ($REPOSITORY_PATH.toString() + "\.env")
Write-Host "Las dependencias fueron configuradas exitosamente, configurando el framework" -ForegroundColor Green
php artisan key:generate --no-interaction
php artisan cache:clear --no-interaction
php artisan view:clear --no-interaction
php artisan migrate --no-interaction
Write-Host "Instalacion finalizada, avisa si hubo algun error o sigue sin funcionar" -ForegroundColor Green
Write-Host "Acordate que el comando para iniciar es php artisan serve" -ForegroundColor