#Al ejecutar este script te encuentras con el error:
# 'la ejecución de scripts está deshabilitada en este sistema'?
# Eso es debido a una directiva de seguridad de windows para evitar scripts maliciosos
# Puedes desactivar esa directiva con el siguiente comando en PowerShell:

# Set-ExecutionPolicy Unrestricted -Scope CurrentUser 

# Con eso cualquier script powershell se puede ejecutar en tu computadora con tu usuario de windows, incluyendo este.
# Eso te dejara expuesto a riesgos de seguridad, asi que ejecuta el siguiente comando luego de haber ejecutado este script:

# Set-ExecutionPolicy Restricted -Scope CurrentUser 

# Con eso reactivas la politica de seguridad


Write-Output @off
$host.ui.RawUI.WindowTitle = "Auto-Instalador de Laravel"

Set-Variable -Name PHP_VERSION -Option Constant -Value 8.1
Set-Variable -Name COMPOSER_VERSION -Option Constant -Value 2.2
Set-Variable -Name REPOSITORY_PATH -Option Constant $pwd
Set-Variable -Name ADMIN_RIGHTS -Option Constant ([Security.Principal.WindowsPrincipal] ` [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator)
Set-Variable -Name INSTALL_COMPOSER_DIRECTORY -Value "$env:ProgramData\composer\"
Set-Variable -Name CURRENT_GIT_BRANCH -Option Constant -Value (git branch --show-current)
Set-Variable -Name PROJECT_NAME -Option Constant -Value ("'" + (Split-Path $PSScriptRoot -Leaf) + "'");
Set-Variable -Name COMPOSER_SETUP_HASH -Option Constant -Value "55CE33D7678C5A611085589F1F3DDF8B3C52D662CD01D4BA75C0EE0459970C2200A51F492D557530C71C15D8DBA01EAE";

Write-Host "Auto-Instalador de Laravel" -ForegroundColor Green
Write-Host "Antes de proceder, asegurese que abrio este archivo"-ForegroundColor Green
Write-Host "en el lugar exacto en donde esta ubicado en el repositorio web"-ForegroundColor Green
Write-Host "No habra el archivo fuera del repositorio web"-ForegroundColor Green
Write-Host "Version minima de PHP Requerida: " $PHP_VERSION -ForegroundColor Yellow
Write-Host "Version minima de Composer Requerida: " $COMPOSER_VERSION -ForegroundColor Yellow
Write-Host ""
Write-Host "WARNING: Usted esta trabajando en el branch " $CURRENT_GIT_BRANCH -ForegroundColor Yellow
Write-Host "Por cada vez que cambies de branch, deberas reejecutar el autoinstalador" -ForegroundColor Yellow
Write-Host "Ya que los cambios entre branchs pueden romper y el autoinstalador te reconfigurara todo" -ForegroundColor Yellow
Write-Host "para que tu laravel vuelva a encender reparando el problema" -ForegroundColor Yellow
Write-Host "sin que tengas que reescribir codigo ni ejecutar comandos, solo este autoinstalador" -ForegroundColor Yellow

if ((Read-Host -Prompt 'Desea proceder? Escriba SI/NO') -ne "SI") {
    throw "FATAL: Instalacion inicial abortada por el usuario"
}

# Get-ItemProperty HKLM:\Software\Wow6432Node\Microsoft\Windows\CurrentVersion\Uninstall\* | Select-Object DisplayName | Select-Object XAMPP
function xamppInstallValidation {
    try {
        Set-Variable -Name XAMPP_DIRECTORY -Scope Script -Option Constant -Value ((Get-ItemProperty HKLM:\Software\xampp\ | Select-Object Install_Dir).Install_Dir);
        Set-Variable -Name MYSQL_PATH -Scope Script -Option Constant -Value ($XAMPP_DIRECTORY + "\mysql\bin\mysql.exe");

        Write-Host "La validacion de la instalacion de XAMPP ha sido un exito, continuando..." -ForegroundColor Green
    }
    catch [System.Security.SecurityException] {
        throw "FATAL: No se tiene acceso al regedit, ejecute el autoinstalador como administrador, abortando...";
    }
    catch [System.Management.Automation.ItemNotFoundException] {
        Write-Host "No se ha encontrado el programa XAMPP, podra continuar solo si proporciona la URL absoluta del mysql.exe" -ForegroundColor Yellow
        Write-Host "Desea proporcionar la URL absoluta alternativa a MySQL/MariaDB o desea abortar el autoinstalador?" -ForegroundColor Yellow
        if ("SI" -eq (Read-Host -Prompt "Escriba SI/NO")) {
            Write-Host "Proporcione ruta absoluta del proceso mysql.exe";
            Set-Variable MYSQL_PATH -Scope Script -Option Constant -Value (Read-Host "Escriba...");
            if (!Test-Path $MYSQL_PATH) {
                throw "FATAL: La URL Absoluta alternativa de mysql.exe proporcionada no lleva a ningun archivo existente, abortando...";
            }
            else {
                Write-Host "URL Absoluta de mysql.exe modificada manualmente, continuando..." -ForegroundColor Green
            }
        }
        else {
            throw "FATAL: XAMPP No esta instalado y no se ha proporcionado una URL absoluta alternativa del proceso mysql.exe";
        }
    }
    #catch {
    #    throw "FATAL: Ha ocurrido un error desconocido al acceder al regedit para validar XAMPP, abortando...";
    #}
}

xamppInstallValidation

#Write-Host $XAMPP_DIRECTORY -ForegroundColor Yellow;
#Write-Host $MYSQL_PATH -ForegroundColor Yellow;
#Invoke-Expression ('{0} --batch --skip-column-names -u root -e "SHOW DATABASES LIKE {1};"' -f $MYSQL_PATH, $PROJECT_NAME);

function PHPenviromentTest() {
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

PHPenviromentTest

<#
function setupComposer() {
    Write-Host "Verificando instalacion de composer en el entorno" -ForegroundColor Green
    if (!([bool](Get-Command composer -ErrorAction SilentlyContinue))) {
        Write-Host "WARNING: Composer no esta instalado y es obligatorio para el funcionamiento del programa. Si lo desea, puede instalarlo" -ForegroundColor Yellow
        if ((Read-Host -Prompt "Desea instalar composer? SI/NO") -ne "SI") {
            throw "FATAL: Composer no esta instalado en el entorno y el usuario rechazo explicitamente su instalacion"
        }
        else {
            Write-Host "Para instalar composer se necesita que este script haya sido ejecutado con privilegios de administrador" -ForegroundColor Yellow
            if (!($ADMIN_RIGHTS)) {
                throw "FATAL: Se intento instalar composer sin privilegios de administrador"
            }
            else {
                $INSTALL_COMPOSER_DIRECTORY = "$($env:ProgramFiles.toString())\composer\"
                Write-Host "Ruta de instalacion de composer:" $INSTALL_COMPOSER_DIRECTORY -ForegroundColor Cyan
                if (Test-Path $INSTALL_COMPOSER_DIRECTORY) {
                    Remove-Item $INSTALL_COMPOSER_DIRECTORY -Recurse
                }
                mkdir $INSTALL_COMPOSER_DIRECTORY
                Set-Location $INSTALL_COMPOSER_DIRECTORY
                php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
                $FileHash = (Get-FileHash composer-setup.php -Algorithm SHA384 | Select-Object Hash).Hash;
                Write-host ("Hash recibido: ") -ForegroundColor Yellow
                Write-Host ($FileHash) -ForegroundColor Yellow;
                Write-Host ("Hash esperado: " + $COMPOSER_SETUP_HASH) -ForegroundColor Yellow
                if (($FileHash) -ne ($COMPOSER_SETUP_HASH)) {
                    php -r "unlink('composer-setup.php');"
                    throw "FATAL: El hash del composer setup descargado no coincide con el especificado en el auotinstaldor";
                } else {
                    Write-Host "HASH Verificado exitosamente, instalando composer..." -ForegroundColor Yellow
                    php composer-setup.php
                    php -r "unlink('composer-setup.php');"
                    Write-Host "Composer se ha instalado con exito, refrescando variables de entorno" -ForegroundColor Green
                    refreshenv
                    Write-Host "Variables de entorno refrescadas con exito, continuando instalacion..." -ForegroundColor Green
                }
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

setupComposer #>


Write-Host "Verificando instalacion de composer en el entorno" -ForegroundColor Green

if (!([bool](Get-Command composer -ErrorAction SilentlyContinue))) {
    throw "FATAL: Composre no se encuentra instalado en esta computadora, por favor instalelo"
}
else {
    if ((composer --version) -lt $COMPOSER_VERSION) {
        throw "FATAL: La version de composer instalada es inferior a la requerida. Version instalada:" + (composer --version) 
    }
    Write-Host "La comprobacion de composer fue un exito. Version de composer instalada: " + (composer --version) -ForegroundColor Green 
}


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

if ((php -r "echo(boolval(extension_loaded('zip')));") -ne 1) {
    throw "FATAL: La extension zip de PHP no esta activada, por favor activela...";
}

Write-Host "Configurando sistema" -ForegroundColor Green
composer install
Copy-Item ($REPOSITORY_PATH.toString() + "\.env.example") -Destination ($REPOSITORY_PATH.toString() + "\.env")
Write-Host "Las dependencias fueron configuradas exitosamente, configurando el framework" -ForegroundColor Green
 
if ($null -eq (Invoke-Expression ('{0} --batch --skip-column-names -u root -e "SHOW DATABASES LIKE {1};";' -f $MYSQL_PATH, $PROJECT_NAME))) {
    Write-Host "No se le solicitara borrar la base de datos ya que la misma no existe" -ForegroundColor Green
}
else {
    if ((Read-Host -Prompt "Deseas borrar la base de datos anterior de este sitio si es que tenias una? SI/NO") -eq "SI") {
        <# php artisan migrate:rollback#> 
        Invoke-Expression ('{0} --batch -e "DROP DATABASE {1};" -u root' -f $MYSQL_PATH, $PROJECT_NAME -replace "'", "");
    }
    else {
        Write-Host "Usted marco que NO a borrar la base de datos anterior, esto puede ocasionar fallas, continuando..." -ForegroundColor Yellow
    }
}

Write-Host "Generando KEY del repositorio..." -ForegroundColor Green
php artisan key:generate --no-interaction

Write-Host "Eliminado cache de configuracion y de rutas" -ForegroundColor Green
php artisan optimize --no-interaction

Write-Host "Borrando cache del respositorio..." -ForegroundColor Green
php artisan cache:clear --no-interaction

Write-Host "Borrando cache de vistas del repositorio..." -ForegroundColor Green
php artisan view:clear --no-interaction

Write-Host "Ejecutando las migraciones del repositorio..." -ForegroundColor Green
php artisan migrate --no-interaction --force

Write-Host "Ejecutando la siembra de la base de datos del proyecto..." -ForegroundColor Green
php artisan db:seed

Write-Host "Instalacion finalizada, avisa si hubo algun error o sigue sin funcionar" -ForegroundColor Green
Write-Host "Acordate que el comando para iniciar es php artisan serve" -ForegroundColor Green