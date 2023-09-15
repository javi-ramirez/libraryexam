## About the Library Application

The Read and Read Library is an application that allows you to manage the loans you make to your users. It provides information about the availability of each book and the follow-up of its loans.


Manual de Instalación para la Aplicación Laravel "libraryexam"
Este manual te guiará a través del proceso de configuración y ejecución de la aplicación Laravel "libraryexam" en tu entorno local.
Requisitos Previos
Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:
1.	PHP: Debe estar instalado en tu sistema. Puedes verificar si está instalado ejecutando php -v en la terminal.

2.	Composer: Necesitas Composer para administrar las dependencias de Laravel. Puedes descargarlo desde https://getcomposer.org/.

3.	MySQL: Debes tener un servidor MySQL instalado en tu sistema. Puedes usar XAMPP, MAMP o cualquier otro servidor local.
Pasos de Instalación
Sigue estos pasos para instalar y ejecutar la aplicación "libraryexam":

1.	Clona el Repositorio:

Abre la terminal y ejecuta el siguiente comando para clonar el repositorio:

git clone https://github.com/javi-ramirez/libraryexam.git 

2.	Navega al Directorio del Proyecto:
Cambia al directorio del proyecto:

cd libraryexam 

3.	Instala las Dependencias:
Ejecuta el siguiente comando para instalar todas las dependencias de Composer:

composer install 

4.	Copia el Archivo de Configuración .env:
Copia el archivo de configuración de ejemplo .env.example y crea un archivo .env:

cp .env.example .env 

5.	Genera una Clave de Aplicación:
Ejecuta el siguiente comando para generar una clave de aplicación en el archivo .env:

php artisan key:generate 

6.	Configura la Base de Datos:
Abre el archivo .env y configura la conexión a la base de datos MySQL con los siguientes valores:

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:WosiIhmmrltc8dcVZQ3csw0z5ylaOsAlxHc8upJBGLw=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=libraryexam_db
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD=tu_contraseña_mysql

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

APP_RESOURCES=tu_ruta_resources ej:http://localhost/libraryexam/resources/
APP_STORAGE= tu_ruta_storage ej:http://localhost/libraryexam/storage/app/public/

TWILIO_SID=AC7ff0b13f504649802b8b035ad5c692ed
TWILIO_AUTH_TOKEN=7b43388003b8fa2b48e7017d907ccc0d
TWILIO_PHONE_NUMBER=+13144852553
TWILIO_WHATS_NUMBER=+14155238886

Asegúrate de crear una base de datos MySQL llamada libraryexam_db en tu servidor local y proporciona las credenciales adecuadas.

7.	Ejecuta las Migraciones:
Ejecuta las migraciones para crear las tablas de la base de datos:
php artisan migrate 

8.	Puebla la Base de Datos:
Si deseas llenar la base de datos con datos de ejemplo, puedes importar el archivo libraryexam_db.sql que se encuentra en la raíz del proyecto. Puedes usar una herramienta como phpMyAdmin o ejecutar el siguiente comando:
mysql -u tu_usuario_mysql -p libraryexam_db < libraryexam_db.sql 

Cono nota adicional, las contraseñas de los usuarios se encuentra encriptadas, las credenciales son las siguientes:

email: javier_agustinrm@hotmail.com 
pass: AB12cd34.
email: javi.guti.rama@hotmail.com 
pass: AB12cd34.
email: javi.guti.rama@gmail.com 
pass: AB12cd34.

9.	Inicia el Servidor de Desarrollo:
Ejecuta el siguiente comando para iniciar el servidor de desarrollo:

php artisan serve 

Esto iniciará el servidor en http://localhost:8000. Puedes acceder a la aplicación en tu navegador.

10.	Accede a la Aplicación:
Abre tu navegador web y navega a http://localhost:8000. Deberías ver la aplicación "libraryexam" funcionando.
¡Listo! Has instalado la aplicación Laravel "libraryexam" en tu entorno local. Ahora puedes explorar y utilizar la aplicación según tus necesidades.
Recuerda que este es un ejemplo general y los detalles exactos pueden variar según tu entorno y configuración específicos. Asegúrate de seguir las instrucciones proporcionadas en el repositorio y realizar cualquier ajuste necesario en función de la configuración real de tu sistema.
