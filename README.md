<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Base de datos

Se crea una base de datos relacional en la cual se tienen dos tablas una llamada records y otra llamada documents, en la cual se evidencia una llave foranea de una a muchas en donde un id del tipo de documento puede estar ligado a muchos registros.

![image](https://github.com/sergiodaza97/Monkey_Crud/assets/79348915/e0296200-e37b-4b3d-a4cf-97bcc90e8dc8)

# Migraciones: Se crean las tablas mediante migraciones para facilitar el uso del proyecto utilizando php artisan migrate se crean de manera automatica, aunque si se quisieran crear de manera manual solo debe correr "CREATE TABLE `monkey`.`record` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `name` VARCHAR(450) NOT NULL , `last_name` VARCHAR(450) NOT NULL , `email` VARCHAR(450) NOT NULL , `password` VARCHAR(450) NOT NULL , `type_document_id` INT NOT NULL ) ENGINE = InnoDB;" (para la tabla documents) y "CREATE TABLE `monkey`.`record` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `name` VARCHAR(450) NOT NULL , `last_name` VARCHAR(450) NOT NULL , `email` VARCHAR(450) NOT NULL , `password` VARCHAR(450) NOT NULL , `type_document_id` INT NOT NULL ) ENGINE = InnoDB;" ( Para la tabla records).
# Sedders: Se crean registros pre cargados a traves de sedder para la tabla de documents en la cual se crean cuatro registros para el tipo de documento, los cuales son  [ 1 => Registro Civil, 2 => Tarjeta de Identidad, 3 => Cédula de Ciudadanía, 4 => Cédula de Extranjeria], lo cual podemos cargar al utilizar comando php artisan migration --seed
     

## Postman
Se crea una coleccion en Postman para facilitar su uso y poder hacer pruebas del crud, el cual se puede descargar e importar a postman para utilizar libremente, este ya cuenta con los JSON necesarios unicamente se deben agregar los datos.
Link de descarga: https://drive.google.com/file/d/1QodIThQi816hVAkNbcOu8edO4T-Mmaz0/view?usp=sharing


