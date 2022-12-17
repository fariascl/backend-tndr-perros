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

Y para finalizar, se levanta con el comando `php artisan serve`

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

## Interacciones 

### Agregar interacción
Ruta: `/api/interacciones/agregar`

Método: **POST**

### Obtener todas
Ruta: `/api/interacciones/all`

Método: **GET**

### Ver perro por id 
Ruta: `/api/interacciones/perro/:id`

Método: **GET**