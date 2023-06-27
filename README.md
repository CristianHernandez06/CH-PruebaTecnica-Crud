# CH-PruebaTecnica-Crud :fa-eye:

Este repositorio contiene una prueba técnica de un **CRUD** (Create, Read, Update, Delete) desarrollado por **Cristian Hernández.**

## Descripción

El objetivo de este proyecto es implementar un CRUD básico utilizando tecnologías web como HTML, CSS, JavaScript y PHP. El CRUD permite crear, leer, actualizar y eliminar registros en una base de datos.

El proyecto sigue una arquitectura MVC (Modelo-Vista-Controlador) para una organización clara y separación de responsabilidades.

## Características

- Creación de registros en la base de datos.
- Lectura de registros desde la base de datos.
- Actualización de registros existentes.
- Eliminación de registros de la base de datos.

## Requisitos

- Servidor web local (como **XAMPP, WAMP o MAMP**) configurado con PHP y MySQL o PostgreSQL.
- Navegador web actualizado.

## Base de datos

El código del proyecto está disponible para utilizar tanto con MySQL como con PostgreSQL. Puedes seleccionar el gestor de base de datos que prefieras para ejecutar el CRUD.

## Instalación

1. Clona este repositorio en tu máquina local utilizando el siguiente comando:

- **git clone https://github.com/CristianHernandez06/CH-PruebaTecnica-Crud.git**


2. Mueve los archivos a tu servidor web local. Por ejemplo, si estás utilizando XAMPP, copia los archivos en la carpeta `htdocs`.

3. Configura la base de datos:
- **MySQL**: Importa el archivo SQL `crud_ch_mysql.sql` en tu servidor MySQL para crear la base de datos y la tabla necesaria.
- **PostgreSQL**: Importa el archivo SQL `crud_ch.sql` en tu servidor PostgreSQL para crear la base de datos y la tabla necesaria.

4. Actualiza la configuración de la base de datos:
- Abre el archivo `config.php` en la carpeta `includes`.
- Modifica los valores de configuración de acuerdo con tu entorno de base de datos (nombre de host, nombre de usuario, contraseña y nombre de la base de datos).

5. Inicia tu servidor web local.

6. Abre tu navegador web y accede al proyecto ingresando la URL correspondiente a la ubicación de los archivos en tu servidor local.

## Contribuciones

Las contribuciones son bienvenidas. Si encuentras errores o mejoras en el proyecto, no dudes en abrir un [issue](https://github.com/CristianHernandez06/CH-PruebaTecnica-Crud/issues) o enviar un [pull request](https://github.com/CristianHernandez06/CH-PruebaTecnica-Crud/pulls).
