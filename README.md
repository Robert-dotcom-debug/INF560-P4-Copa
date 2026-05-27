# Notas App

Aplicación web CRUD hecha con Laravel para registrar, editar, visualizar y eliminar notas personales. Las notas pueden clasificarse por categoría y marcarse como fijadas para aparecer primero en el listado.

## Requisitos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- PostgreSQL u otro motor compatible con Laravel

## Instalación

Clona o abre el proyecto y entra a la carpeta:

```bash
cd notas-app
```

Instala las dependencias de PHP:

```bash
composer install
```

Instala las dependencias de frontend:

```bash
npm install
```

Copia el archivo de entorno:

```bash
copy .env.example .env
```

En Linux o macOS:

```bash
cp .env.example .env
```

Genera la clave de la aplicación:

```bash
php artisan key:generate
```

## Base de Datos

Si usarás PostgreSQL, configura el archivo `.env`, puedes usar:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=notas_app
DB_USERNAME=postgres
DB_PASSWORD=tu_contraseña
```

Crea la base de datos:

```bash
psql -U postgres
CREATE DATABASE notas_app;
\q
```

Ejecuta las migraciones:

```bash
php artisan migrate
```

Para cargar datos de ejemplo:

```bash
php artisan db:seed
```

También puedes reiniciar la base de datos y cargar datos de ejemplo en un solo comando:

```bash
php artisan migrate:fresh --seed
```

## Ejecutar la Aplicación

Compila los archivos de frontend:

```bash
npm run build
```

Inicia el servidor de Laravel:

```bash
php artisan serve
```

Abre la aplicación en:

```text
http://127.0.0.1:8000/notas
```

## Modo de Desarrollo

Si quieres trabajar con Vite observando cambios en CSS y JavaScript, ejecuta en una terminal:

```bash
npm run dev
```

Y en otra terminal:

```bash
php artisan serve
```

## Pruebas

Para ejecutar las pruebas del proyecto:

```bash
php artisan test
```
