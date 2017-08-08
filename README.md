# Animalitos

### Tecnologías

+ PHP (5.3+)
+ SQLite3
+ Composer
+ Bower
+ NodeJS - NPM - Gulp

### Instalación - Despliegue

 	$ composer install

### Para recargar el autoload de clases:

 	$ composer dump-autoload -o && npm install && bower install 

### Generar 'dist'
	
	$ gulp layout && grub home 

### Fuentes externas:

+ Login form : https://bootsnipp.com/snippets/featured/modal-login-with-jquery-effects

### TODO

+ Validación del formulario de registro valida como correo no registrado en la base de datos si al final del correo se añade un espacio
+ El menú del sitio debe ser un backboneView con su propio model
+ Cuando se usa la validación de campos en forms del login el contenedor del todo el login no se expande con el contenido
+ Hacer que el login se comunique con el servidor mediante AJAX

---

 Thanks/Credits

    Pepe Valdivia: developer Software Web Perú [http://softweb.pe]