# <p align="center">Prueba de conocimiento MonkeyJobs</p>

## Base de datos

Se crea una base de datos relacional en la cual se tienen dos tablas una llamada records y otra llamada documents, en la cual se evidencia una llave foranea de una a muchas en donde un id del tipo de documento puede estar ligado a muchos registros.

![image](https://github.com/sergiodaza97/Monkey_Crud/assets/79348915/e0296200-e37b-4b3d-a4cf-97bcc90e8dc8)

 - ### Migraciones: 
    Se crean las tablas mediante migraciones para facilitar el uso del proyecto utilizando php artisan migrate se crean de manera         automatica, aunque si se quisieran crear de manera manual solo debe correr "CREATE TABLE `monkey`.`record` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `name` VARCHAR(450) NOT NULL , `last_name` VARCHAR(450) NOT NULL , `email` VARCHAR(450) NOT NULL , `password` VARCHAR(450) NOT NULL , `type_document_id` INT NOT NULL ) ENGINE = InnoDB;" (para la tabla documents) y "CREATE TABLE `monkey`.`record` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `name` VARCHAR(450) NOT NULL , `last_name` VARCHAR(450) NOT NULL , `email` VARCHAR(450) NOT NULL , `password` VARCHAR(450) NOT NULL , `type_document_id` INT NOT NULL ) ENGINE = InnoDB;" ( Para la tabla records).
 - ### Sedders: 
    Se crean registros pre cargados a traves de sedder para la tabla de documents en la cual se crean cuatro registros para el tipo de documento, los cuales son  [ 1 => Registro Civil, 2 => Tarjeta de Identidad, 3 => Cédula de Ciudadanía, 4 => Cédula de Extranjeria], lo cual podemos cargar al utilizar comando php artisan migration --seed
     

## Postman
Se crea una coleccion en Postman para facilitar su uso y poder hacer pruebas del crud, el cual se puede descargar e importar a postman para utilizar libremente, este ya cuenta con los JSON necesarios unicamente se deben agregar los datos.
Link de descarga: https://drive.google.com/file/d/1QodIThQi816hVAkNbcOu8edO4T-Mmaz0/view?usp=sharing

## Instalar el proyecto
 - Crear una base de datos con el nombre "monkey"
 - Clonar o descargar el proyecto en el directorio de tu servidor web
 - Acceder mediante terminal a la carpeta del proyecto
 - Ejecutar: Composer install
 - Crear el archivo .env con los comandos: cp .env.example .env
 - Generar la API key ejecutando: php artisan key:generate
 - En el archivo .env colocar el nombre de la base de datos que se va a utilizar en este caso "monkey"
 - Para ejecutar las migraciones: php artisan migrate --seed
 - Por ultimo correr comando php artisan serve para poder correr pruebas.

## Herramientas de Desarrollo
 - Laravel Framework v - 8
 - PHP 7
 - visual studio code
 - postman
 - xampp
 - MySQL phpMyAdmin
 - GitHub
