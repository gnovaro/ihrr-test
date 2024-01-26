# Code challenge Gustavo

## Instalar el proyecto localmente

Clonar el Repositorio:
```bash
git clone https://github.com/gnovaro/ihrr-test.git
```
Entrar al Directorio del Proyecto
```bash
cd ihrr-test
```
Instalar Dependencias:
```bash
composer install
```

Configurar el Archivo .env
```bash
cp .env.example .env
```
Generar una Clave de Aplicación
```bash
php artisan key:generate
```
Ejecutar Migraciones y Semillas (Si es necesario)
```bash
php artisan migrate --seed
```
Iniciar el Servidor de Desarrollo
```bash
php artisan serve
```

Acceder a tu Aplicación
http://localhost:8000

## Tests
Ejecutar los tests
```bash
php artisan test
```

solo los tests unitarios
```bash
./vendor/bin/phpunit --testsuite Unit
```

## Migraciones
ejecutar las migraciones
```bash
php artisan migrate
```

Estimado candidato:

Tu tarea es refactorizar un controlador de **API REST** en **Laravel 10** que actualmente
contiene métodos para crear, mostrar, editar, actualizar y eliminar registros de la
entidad "Lead". El controlador proporcionado tiene problemas de diseño y no sigue las
mejores prácticas de codificación. Se espera que implementes principios de "Clean
Code" y patrones SOLID en tu solución.

### El controlador actual contiene los siguientes métodos:

* **create**: para crear un nuevo lead.
* **show**: para mostrar los detalles de un lead existente.
* **edit**: para editar un lead existente.
* **update**: para actualizar un lead existente.
* **destroy**: para eliminar un lead existente.

Además, el controlador interactúa con un servicio de scoring, que determina la calidad
del lead.

## Objetivo

Tu objetivo es revisar el código proporcionado y realizar las acciones necesarias para
mejorar su calidad. Algunas áreas a tener en cuenta son:

1. Aplicar principios SOLID y "Clean Code".
2. Evaluar el manejo de respuestas y códigos HTTP.
3. Mejorar la legibilidad y mantenibilidad del código.
4. Considerar la separación de responsabilidades y la estructura del código.
5. Manejar adecuadamente los errores.
6. Realizar los tests necesarios.
