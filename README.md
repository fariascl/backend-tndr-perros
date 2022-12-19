# backend-tndr-perros
# Tarea 3 de Taller de Desarrollo Web Avanzado
## Este es la API del tinder para perritos

Nombre: Alejandro Farías

# Instalación
Para comenzar, es necesario tener instalado `Git` y `Composer`.

Con lo antes mencionado ya instalado, se clona el repositorio:

`git clone https://github.com/fariascl/backend-tndr-perros.git`

Luego, se accede al directorio donde fue clonado:

`cd /donde/esta/el/repo`

Y estando ya en el repositorio clonado, se accede a la carpeta donde está el código fuente:

`cd backend-tndr-peperros/`

Allí, se procede a instalar los paquetes de laravel, que van adjuntos en el `package.json`

`composer i`

Después de instalar las dependencias, se procede a copiar y renombrar el archivo de `.env.example a .env` con el comando de a continuación:

`cp .env.example .env`

Con lo anterior realizado, se procede a modificar el archivo `.env` y a ingresar las credenciales de tu base de datos:

```env
DB_DATABASE=<nombre_base_datos>
DB_USERNAME=<usuario_base_datos>
DB_PASSWORD=<contraseña_base_datos>
```

Y para finalizar, se ejecutan las migraciones con el comando `php artisan migrate`, y terminado lo anterior, se levanta la API con el comando `php artisan serve`

Opcional: Puedes poblar la tabla `perros` a través del factory que fue creado, ejecutando el comando `php artisan db:seed`

# Rutas

## Perro
### Agregar perro

Ruta: `/api/perros/agregar`

Método: **POST**

```json
{
	"nombre": :nombre,
	"imagen": :url",
	"descripcion": :descripcion
}
```

### Ver perro

Método: **GET**

Ruta `/api/perros/ver/:id_perro`

### Actualizar perro
Ruta: `/api/perros/actualizar`

Método: **PUT**
```json
{
	"id": :id,
	"nombre": :nuevo_nombre,
	"imagen": :nueva_imagen,
	"descripcion": :nueva_descripcion
}
```

### Eliminar perro
Ruta: `/api/perros/eliminar`

Método: **DELETE**

```json
{
	"id": :id
}
```

## Interacciones 

### Agregar interacción
Ruta: `/api/interacciones/agregar`

```json 
{
	"perro_interesado_id": :id_perro_interesado,
	"perro_candidato_id": :id_perro_candidato,
	"preferencia": "A"
}
```
Por validaciones solo se permite "A" (aceptar) o "R" (rechazar), además, el id del perro interesado debe ser diferente al id del perro candidato

Método: **POST**

### Obtener todas
Ruta: `/api/interacciones/all`

Método: **GET**

### Ver perro por id 
Ruta: `/api/interacciones/perro/:id`

Método: **GET**
