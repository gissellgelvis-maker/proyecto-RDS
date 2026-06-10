# API CRUD de Empleados - Laravel + Sanctum

## Descripción

Esta API permite gestionar empleados, cargos y funciones de cargo mediante operaciones CRUD (Crear, Consultar, Actualizar y Eliminar).

La autenticación se realiza mediante tokens utilizando Laravel Sanctum.

----------------------------

## Requerimientos

* PHP 8.4 o superior
* Composer
* MySQL
* Laravel 12
* Laravel Sanctum

----------------------------

## Instalación

### Clonar repositorio

```bash
git clone <url-del-repositorio>
cd proyecto-RDS
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

### Pruebas de la API con cURL

# 1. Iniciar sesión

1.Login(obtener token)

curl -X POST http://127.0.0.1:8000/api/login \
-H "Content-Type: application/json" \
-d "{\"email\":\"admin@gmail.com\",\"password\":\"12345678\"}"

# Le devolvera algo como 

{
    "message":"Login exitoso",
    "token":"5|FycLz8pu4crkY3UpyQ755rjcAu5uVqIqH8qMt6Kj0354edeb",
    "user":{
        "id":1,
        "name":"admin",
        "email":"admin@gmail.com",
        "email_verified_at":null,
        "created_at":"2026-06-08T17:45:43.000000Z",
        "updated_at":"2026-06-08T17:45:43.000000Z"
        }
}

### 2. Listar empleados

# Reemplaza TU_TOKEN por el token obtenido:

curl -X GET http://127.0.0.1:8000/api/empleados \
-H "Accept: application/json" \
-H "Authorization: Bearer TU_TOKEN"

### 3. Buscar un empleado

curl -X GET http://127.0.0.1:8000/api/empleados/6 \
-H "Accept: application/json" \
-H "Authorization: Bearer TU_TOKEN"

### 4 Crear empleado

curl -X POST http://127.0.0.1:8000/api/empleados \
-H "Content-Type: application/json" \
-H "Authorization: Bearer TU_TOKEN" \
-d "{\"nombres\":\"Lusia\",\"apellidos\":\"Perez\",\"fecha_nacimiento\":\"2000-01-15\",\"fecha_ingreso\":\"2024-01-10\",\"salario\":2500,\"estado\":\"activo\",\"id_cargo\":1}"

### 5 Actualizar empleado

curl -X PUT http://127.0.0.1:8000/api/empleados/1 \
-H "Content-Type: application/json" \
-H "Authorization: Bearer TU_TOKEN" \
-d "{\"salario\":3000}"

### 6 Eliminar empleado

curl -X DELETE http://127.0.0.1:8000/api/empleados/1 \
-H "Authorization: Bearer TU_TOKEN"

###  7 Cerrar sesion

curl -X POST http://127.0.0.1:8000/api/logout -H "Accept: application/json" -H "Authorization: Bearer TOKEN_GENERADO"



# Pruebas

Ejecutar todas las pruebas automatizadas:

php artisan test
