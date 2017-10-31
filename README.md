# Curso Profesional CakePHP 3

Hoy por hoy el mundo de los frameworks ha crecido a pasos agigantados,
sin embargo con tanta diversidad vale la pena preguntarse ¿me conviene usar un framework?
¿cuál de todos es la mejor opción para mi? ¿cómo puedo profundizar mi conocimiento?

Durante este curso revisaremos a profundidad el patrón de Arquitectura de Software MVC (Model View Controller)
usando uno de los frameworks mejor diseñados y más rápidos de aprender: CakePHP.

## Pre-requisitos

1) Este proyecto fue creado con [CakePHP 3](https://cakephp.org/), que nos exige una versión moderna de PHP y
algunas de sus extensiones instaladas:

```
HTTP Server. Apache (mod_rewrite se recomienda) o Nginx.
PHP 5.6.0 or mayor (recomendado PHP 7.1)
mbstring PHP extension
intl PHP extension
simplexml PHP extension
```

Para desarrollo y configuración rápida te recomendamos instalar un meta-paquete como XAMPP
[descargar aquí](https://www.apachefriends.org/download.html). Sólo hay que estar seguros de descargar
XAMPP con PHP 7.1 (recomendado). Esto te instalará MySQL, PHPMyAdmin, Apache y claro un PHP moderno.

2) También necesitaremos composer ([descargar aquí](https://getcomposer.org/)) para descargar las dependencias de
[CakePHP](https://cakephp.org/).


## Instalación para Desarrollo

1) Instalar dependencias de Composer (ejecutar desde el directorio raíz de este proyecto).
```
composer install
```
2) Configurar base de datos:

Para tu comodidad hemos creado un *MySQL dump* en este archivo `<REPO>/webtraining/sql/blog-cake.sql`.
Este archivo contiene datos de demostración.

2.1) Importa esta base de datos usando algún cliente web como PHPMyAdmin o Sequel Pro.
2.2) Crea un usuario que se pueda conectar a esta base de datos, por ejemplo:

```
Base de datos:  blog_cake
Usuario:        blog_cake_user
Constraseña:    F7ca6ZHr4qzu76WC
```

2.3) Copia el archivo llamado `config/app.default.php` en el mismo directorio `config`, y configura tus *Datasources*
con los siguientes datos (base de datos, usuario y contraseña):

```
'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => 'localhost',
            /**
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            //'port' => 'non_standard_port_number',
            'username' => 'blog_cake_user',
            'password' => 'F7ca6ZHr4qzu76WC',
            'database' => 'blog_cake',
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,
```

Lo importante en este caso son los datos de conexión a la base de datos.

3) Iniciar tu servidor en el puerto 8765
```
bin/cake server
```

4) Finalmente abre un navegador web de verdad (como Google Chrome o Firefox) y visita [http://localhost:8765/](http://localhost:8765/).




## CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

### Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

### Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

### Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

### Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) CSS
framework by default. You can, however, replace it with any other library or
custom styles.
