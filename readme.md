# README #

Buenas practicas

* Ordenar los archivos de las migraciones
* Crear todos los archivos y luego hacer el migrate
* Las llaves foraneas dentro de el mismo archivo create cuando hacemos la estructura de base de datos, pero si ya corremos la estructura de la db y queremos añadir una llave foranea hacemos una migracion add_to_foreing
* para hacer llave foranea agregar el campo sin signo tambien en la misma tabla $table->integer('list_id')->unsigned();
$table->foreign('list_id')->references('id')->on('lists');
* si es laravel 5.6 configurar: Middleware->TrustProxies.php poner esta linea = protected $headers = Request::HEADER_X_FORWARDED_ALL; y quitar el array      
* Laravel 5.6 funciona mejor con php 7.1 tanto el de la consola como el de nginx
* Agregar enlas llaves foraneas ->onDelete ('cascada') que es: datos secundarios se eliminan cuando se eliminan los datos principales. entonces, en su caso, si eliminó a un usuario, todas las publicaciones relacionadas con él también se eliminarán.

NOTAS
* Solo un like de un usuario a las listas de musica si ya tiene like la lista del user poner otro.
https://laravel.com/docs/5.6/eloquent-collections
* Notas la autenticación si el usuario esta inactivo no se deje autenticar y aparezca una alerta u otra page
* Tabla comments el user_id es el usuario que comenta en la lista musiclist_id
* Tabla musiclist el user_id es el usuario que creo la listas
* Tabla likes  el user_id es el usuario que le dio like la lista musiclist_id
* Un usuario puede tener varias listas pero una lista no puede pertenecer a varios usuarios
* Un usuario le puede dar like a muchas listas pero no dos veces

Taller de capacitación de Laravel mediante el desarrollo de una App llamada Music List en la que los usuarios podrán crear listas de musica y compartirlas con el resto de la comunidad.

TENER EN CUENTA
* Se copio el codigo de github boostrap 4 https://github.com/laravel-shift/laravel-5.6/edit/master/public/css/app.css ya que no me daba el bootstrap, se pego el codigo en public/css/app.css

Cuenta con los siguientes módulos:

- Autenticación
- Modulo de Listas
- Modulo de comentarios
- Modulo de Me gusta
- Modulo de Usuarios
- Manejo de Roles
- Envio de Emails
