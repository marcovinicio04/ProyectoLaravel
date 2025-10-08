
# 🛒 Tiendita de Don Pepe - CRUD de Productos

Este proyecto es una aplicación web desarrollada en Laravel 12 que permite realizar operaciones **CRUD (Crear, Leer, Actualizar, Eliminar)** sobre una lista de productos. También incluye autenticación mediante Laravel Breeze.

---

## ✅ Funcionalidades

- Registro e inicio de sesión de usuarios
- Listado de productos con acciones de editar y eliminar
- Formulario para agregar nuevos productos
- Validaciones en formularios
- Mensajes de éxito al crear, editar y eliminar productos
- Estilos personalizados con `public/css/estilos.css`

---

## 🔧 Requisitos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- MySQL

---

## ⚙️ Instalación

1. Clona el proyecto o descárgalo en tu computadora:

```
git clone [url-del-repositorio]
```

2. Entra al proyecto:

```
cd proyecto
```

3. Instala las dependencias de PHP y JavaScript:

```
composer install
npm install
```

4. Copia el archivo `.env.example` y renómbralo a `.env`:

```
cp .env.example .env
```

5. Genera la clave de la aplicación:

```
php artisan key:generate
```

6. Configura la conexión a tu base de datos MySQL en el archivo `.env`:

```
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

(ajusta según tu configuración local)

7. Ejecuta las migraciones:

```
php artisan migrate
```

8. Compila los assets (CSS y JS) con Vite:

```
npm run dev
```

---

## ▶️ Ejecutar el servidor

Inicia el servidor de desarrollo con:

```
php artisan serve
```

Y abre en tu navegador:

```
http://127.0.0.1:8000
```

---

## 👤 Usuario

- Puedes registrarte desde `/register` y luego acceder a `/dashboard`
- Desde el dashboard puedes ir al listado de productos

---

## 📁 Estructura importante

- `resources/views/productos/` → vistas Blade (`index`, `create`, `edit`)
- `app/Http/Controllers/ProductoController.php` → lógica del CRUD
- `public/css/estilos.css` → estilos personalizados
- `routes/web.php` → rutas principales

---

## ✍️ Autor

Marco Jara Serna
