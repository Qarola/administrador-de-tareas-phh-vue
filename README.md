Esta es una aplicación fullstack, construida con tecnologías como: Backend: PHP-Laravel , Base de Datos Relacional: MySQL y Frontend: Vue.js y TailwindCSS para los estilos.

## Requisitos Previos
```sh
Asegúrese de tener instalados los siguientes requisitos antes de comenzar:

PHP (versión 8.3.4)
Composer
MySQL 
Node.js (versión 21.6.1)
NPM (administrador de paquetes de Node.js)

```
## Clonar repositorio
```sh
$ git clone https://github.com/Qarola/administrador-de-tareas-php-vue.git
```

## Instalar dependencias PHP
```sh
$ composer install

```

## Instalar dependencias NODE
```sh
$ npm install

```
## Instalar dependencias NODE
```sh
$ npm install

```

## Genera una Clave de Aplicación:
```sh
$ php artisan key:generate
```

## Genera una Clave de Aplicación:
```sh
$ php artisan key:generate
```


## Configure variables de entorno:

`$ touch .env` 

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin-tareas
DB_USERNAME=your DB_USERNAME
DB_PASSWORD=your DB_PASSWORD
APP_DEBUG=true

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=correo_pruebas@midominio.com
```
## Luego corra:
## Back
```sh
$ php artisan serve
```
##Front
```sh
$ npm run serve
```


###
✨ La aplicación cuenta con funcionalidad de “Login” mediante correo y contraseña.
![image](https://github.com/Qarola/administrador-de-tareas-php-vue/assets/67078790/86c883a7-b932-4d41-84b0-3cb2aec1e6df)

###
Los usuarios son registrados manualmente por un usuario super admin, al registrarlos estos
reciben un correo electrónico de bienvenida y en su primer ingreso a la plataforma se les solicita
configurar su contraseña.
![image](https://github.com/Qarola/administrador-de-tareas-php-vue/assets/67078790/e1c13cc4-9951-4b85-bbc6-56788d291078)


![correo-de-prueba](https://github.com/Qarola/administrador-de-tareas-php-vue/assets/67078790/56c000c1-1c97-4548-ba00-044f8cdbed28)

###
Se pueden crear tareas
![task-create-form](https://github.com/Qarola/administrador-de-tareas-php-vue/assets/67078790/1d7f730b-f486-45e7-928b-88352d58390f)

###
Se pueden generar reportes
![image](https://github.com/Qarola/administrador-de-tareas-php-vue/assets/67078790/f9800c38-a06f-48c0-a8ff-2b4e08f5e5d6)

