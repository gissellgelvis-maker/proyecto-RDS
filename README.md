# API CRUD de Empleados - Laravel + Sanctum

## Descripción

Esta API permite gestionar empleados, cargos y funciones de cargo mediante operaciones CRUD (Crear, Consultar, Actualizar y Eliminar).

La autenticación se realiza mediante tokens utilizando Laravel Sanctum.

---

## Requisitos

* PHP 8.4 o superior
* Composer
* MySQL
* Laravel 12
* Laravel Sanctum

---

## Instalación

### Clonar repositorio

```bash
git clone <url-del-repositorio>
cd RDS
```

### Instalar dependencias

```bash
composer install
```

### Configurar variables de entorno

Copiar el archivo de ejemplo:

```bash
cp .env.example .env
```

Configurar la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=proyecto_rds
DB_USERNAME=root
DB_PASSWORD=
```

### Generar clave de aplicación

```bash
php artisan key:generate
```

### Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

### Iniciar servidor

```bash
php artisan serve
```

La API estará disponible en:

```text
http://127.0.0.1:8000
```

---

# Autenticación

## Login

### Endpoint

```http
POST /api/login
```

### Body

```json
{
    "email": "admin@gmail.com",
    "password": "12345678"
}
```

### Respuesta

```json
{
    "message": "Login exitoso",
    "token": "TOKEN_GENERADO",
    "user": {
        "id": 1,
        "name": "admin",
        "email": "admin@gmail.com"
    }
}
```

---

# Autorización

Las rutas protegidas requieren el siguiente encabezado:

```http
Authorization: Bearer TOKEN_GENERADO
Accept: application/json
```

---

# CRUD Empleados

## Listar empleados

### Endpoint

```http
GET /api/empleados
```

### Respuesta

```json
[
    {
        "id_empleado": 1,
        "nombres": "Juan",
        "apellidos": "Perez"
    }
]
```

---

## Obtener empleado por ID

### Endpoint

```http
GET /api/empleados/{id}
```

Ejemplo:

```http
GET /api/empleados/1
```

---

## Crear empleado

### Endpoint

```http
POST /api/empleados
```

### Body

```json
{
    "nombres": "Sebastian",
    "apellidos": "Cant",
    "fecha_nacimiento": "2000-05-10",
    "fecha_ingreso": "2024-01-15",
    "salario": 2500,
    "estado": "activo",
    "id_cargo": 21
}
```

---

## Actualizar empleado

### Endpoint

```http
PUT /api/empleados/{id}
```

### Body

```json
{
    "nombres": "Juan Carlos",
    "salario": 3000
}
```

---

## Eliminar empleado

### Endpoint

```http
DELETE /api/empleados/{id}
```

Ejemplo:

```http
DELETE /api/empleados/1
```

---

# CRUD Cargos

## Listar cargos

```http
GET /api/cargos
```

## Obtener cargo

```http
GET /api/cargos/{id}
```

## Crear cargo

```http
POST /api/cargos
```

## Actualizar cargo

```http
PUT /api/cargos/{id}
```

## Eliminar cargo

```http
DELETE /api/cargos/{id}
```

---

# CRUD Funciones Cargo

## Listar funciones

```http
GET /api/funciones-cargo
```

## Obtener función

```http
GET /api/funciones-cargo/{id}
```

## Crear función

```http
POST /api/funciones-cargo
```

## Actualizar función

```http
PUT /api/funciones-cargo/{id}
```

## Eliminar función

```http
DELETE /api/funciones-cargo/{id}
```

---

# Pruebas

Ejecutar todas las pruebas automatizadas:

php artisan test
