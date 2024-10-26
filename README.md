# Proyecto de Gestión de Tareas

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

## Descripción

Este proyecto es una API de gestión de tareas construida con Laravel. Permite a los usuarios crear, leer, actualizar y eliminar tareas. 

## Características

- Crear nuevas tareas
- Listar todas las tareas
- Obtener información sobre tareas específicas
- Actualizar el estado de una tarea
- Eliminar tareas

## Instalación

Para instalar este proyecto, sigue estos pasos:

1. Clona el repositorio:
   ```bash
   git clone https://github.com/ramelramos/TEST.git


2. Navega al directorio del proyecto:
cd nombre-del-repositorio

3. Instala las dependencias:
composer install

4. Copia el archivo configura tu entorno:
cp .env.example .env
php artisan key:generate
Configura tu base de datos en el archivo .env.

5. Migraciones
php artisan migrate

6. Inicia el servidor:
php artisan serve

7. Uso de API con POSTMAN
Crear tarea: POST /api/tareas
Obtener tareas: GET /api/tareas
Obtener tarea: GET /api/tareas/{id}
Actualizar tarea: PUT /api/tareas/{id}
Eliminar tarea: DELETE /api/tareas/{id}

8. Usuario y Contraseña de API:
ramel@gmail.com
Password: 123

Se Genera la Key para poder realizar los procesos.
