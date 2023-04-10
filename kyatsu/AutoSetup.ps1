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
Set-Variable PHP_VERSION -Option Constant -Value 8.1
Set-Variable COMPOSER_VERSION -Option Constant -Value 2.2
Set-Variable REPOSITORY_PATH -Option Constant $pwd
Set-Variable ADMIN_RIGHTS -Option Constant ([Security.Principal.WindowsPrincipal] ` [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator)
Set-Variable INSTALL_COMPOSER_DIRECTORY -Value "$env:ProgramData\composer\"


#function setPath() {
#    Set-Variable -Name 'path_enviroment' -Scope global -Value ([Environment]::GetEnvironmentVariable('PATH', 'Machine'))
#}
#setPath
#$path_enviroment += ";C:\pRUEBA\TEST2\Composer\;Programa2"

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

<# 
function setupComposer() {
    Write-Host "Verificando instalacion de composer en el entorno" -ForegroundColor Green
    if (!([bool](Get-Command composer -ErrorAction SilentlyContinue))) {
        Write-Host "WARNING: Composer no esta instalado y es obligatorio para el funcionamiento del programa. Si lo desea, puede instalarlo" -ForegroundColor Yellow
        if ((Read-Host -Prompt "Desea instalar composer? SI/NO") -ne "SI") {
            throw "FATAL: Composer no esta instalado en el entorno y el usuario rechazo explicitamente su instalacion"
        }
        else {
            Read-Host -Prompt "Para instalar composer se necesita que este script haya sido ejecutado con privilegios de administrador"
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
                Write-Host "INFO: Directorio a instalar el composer: " + $INSTALL_COMPOSER_DIRECTORY.toString() -ForegroundColor Cyan
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
                Set-Location $REPOSITORY_PATH
                #Composer ya ha sido instalado, ahora debemos establecer su variable de entorno asi se puede ejecutar el comando desde todos lados
                if($path.indexOf($(Get-Variable INSTALL_COMPOSER_DIRECTORY -ValueOnly))) {
                    Write-Host "Parece que la variable de entorno ya ha sido fijada previamente, asi que saltereemos este paso..." -ForegroundColor Green
                    return;
                }
                $env:PATH += ";$(Get-Variable INSTALL_COMPOSER_DIRECTORY -ValueOnly)"
                #$path = [Environment]::GetEnvironmentVariable("PATH", "Machine")
                #$path += ";$(Get-Variable INSTALL_COMPOSER_DIRECTORY -ValueOnly)"
                #$path = [Environment]::SetEnvironmentVariable("PATH", $path, "Machine")
                Write-Host "Las variables de entorno fueron configuradas correctamente, este script se reinciara"
                Read-Host -Prompt "Presione cualquier tecla para continuar"
                RefreshEnv
                <#
                function removeComposerEnviromentVariable() {
                    if ($path_enviroment -match "composer") {
                        $path_position_start
                        $path_position_end
                        $position_start = $path_enviroment.indexOf("composer", 0, [StringComparison]::OrdinalIgnoreCase)
                        Write-Host $position_start -ForegroundColor Cyan
                        for ($i = $position_start; $i -ge 0; $i--) {
                            if (($path_enviroment[$i]) -eq ";") {
                                $path_position_start = $i++;
                                break
                            }
                        }
                        for ($i = $position_start; $i -le ((Get-Variable path_enviroment -ValueOnly).Length); $i++) {
                            Write-Host $i;
                            if ($null -eq ($path_enviroment[$i])) {
                                $path_position_end = $i--;
                                break;
                            } 
                            if (($path_enviroment[$i]) -eq ";") {
                                $path_position_end = $i--;
                                break
                            }
                        }
                        $extracted_string = $path_enviroment.Substring($path_position_start, ($path_position_end - $path_position_start))
                        Write-Host "Se ha detectado una variable de entorno existente para composer. Para evitar problemas de compatibilidad." -ForegroundColor Yellow
                        Write-Host "Se aconseja eliminarla para evitar fallos. Usted desea eliminarla?"
                        if (!((Read-Host -Prompt "SI/NO") -eq "SI")) {
                            Write-Host "Usted marco NO a eliminar la variable de entorno de composer antigua. Esto puede ocasionar fallos, pero puede proseguir..." -ForegroundColor Yellow
                            return;
                        }
                        Write-Host "El valor a extirpar es: "`n $extracted_string -ForegroundColor Cyan
                        Write-host `n
                        $future_path = (Get-Variable path_enviroment -ValueOnly).Replace($extracted_string, "")
                        Write-Host "El nuevo valor de la variable de entorno PATH es: "`n$future_path -ForegroundColor Cyan
                        if ((Read-Host "Desea extirparlo de la variable de entorno PATH? SI/NO") -eq "SI") {
                            $security_filename = "installer_security.txt"
                            [Environment]::SetEnvironmentVariable("PATH", $future_path)
                            if (!(Test-Path "$(Get-Variable REPOSITORY_PATH -ValueOnly)\$security_filename" )) {
                                New-Item -Path (Get-Variable REPOSITORY_PATH -ValueOnly) -ItemType 'file' -Name $security_filename
                                Add-Content -Path "$(Get-Variable REPOSITORY_PATH -ValueOnly)\$security_filename" -Value "Copias de seguridad de la variable de entorno PATH en la instalacion de composer"
                            }
                            Add-Content -Path "$(Get-Variable REPOSITORY_PATH -ValueOnly)\$security_filename" -Value "($((Get-Date).toString("dd-MM-yyyy hh:mm:ss"))`n$(Get-Variable path_enviroment -ValueOnly))"
                            Write-Host "Por seguridad, se ha guardado el valor de la variable de entorno PATH anterior en el archivo installer_security.txt del repositorio" -ForegroundColor Yellow
                            Write-Host "Tenga en cuenta que ese archivo esta en el .gitignore y es especifico de su computadora" -ForegroundColor Yellow
                            Write-Host "Se ha establecido la variable de entorno para composer correctamente" -ForegroundColor Green
                            setPath
                        } else {
                            Write-host "Se ha rechazado la extirpacion de la variable de entorno de composer anterior por el operator" -ForegroundColor Green
                        }
                    }
                }
                removeComposerEnviromentVariable
                function setComposerEnviromentVariable() {
                    $definitive_path = "$(Get-Variable path_enviroment -ValueOnly)$(Get-Variable INSTALL_COMPOSER_DIRECTORY)composer.phar"
                    Write-Host ""
                

                }
                # // >
                #Set-Location $REPOSITORY_PATH
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
#> 

#setupComposer

Write-Host "Verificando instalacion de composer en el entorno" -ForegroundColor Green

if (!([bool](Get-Command composer -ErrorAction SilentlyContinue))) {
    throw "FATAL: Composre no se encuentra instalado en esta computadora, por favor instalelo"
} else {
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

Write-Host "Configurando sistema" -ForegroundColor Green
composer install
Copy-Item ($REPOSITORY_PATH.toString() + "\.env.example") -Destination ($REPOSITORY_PATH.toString() + "\.env")
Write-Host "Las dependencias fueron configuradas exitosamente, configurando el framework" -ForegroundColor Green

if ($null -eq (C:\xampp\mysql\bin\mysql.exe --batch --skip-column-names -e "SHOW DATABASES LIKE 'kyatsu';" -u root)) {
    Write-Host "No se le solicitara borrar la base de datos ya que la misma no existe" -ForegroundColor Green
} else {
    if ((Read-Host -Prompt "Deseas borrar la base de datos anterior de este sitio si es que tenias una? SI/NO") -eq "SI") {
        php artisan migrate:rollback
    } else {
        Write-Host "Usted marco que NO a borrar la base de datos anterior, eso puede ocasionar fallas, continuando..." -ForegroundColor Yellow
    }
}

Write-Host "Generando KEY del repositorio..." -ForegroundColor Green
php artisan key:generate --no-interaction

Write-Host "Eliminado cache de configuracion y de rutas" -ForegroundColor Green
php artisan optimize

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