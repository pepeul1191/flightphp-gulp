/*
Archivos que usa :
	+ views/buscar.js
	+ views/contacto.js
	+ views/registro.js
	+ views/login.js
*/

var ApplicationRouter = Backbone.Router.extend({
	routes : {
		"students/:id" : "getStudent",
		"teachers/:id" : "getTeacher",
		"buscar" : "buscar",
		"contacto" : "contacto",
		"registro" : "registro",
		"login" : "login", 
		"*actions" : "home"
	}
});

var router = new ApplicationRouter();

router.on("route:getStudent", function(id){
	console.log("getting student " + id);
});

router.on("route:getTeacher", function(id){
	console.log("getting teacher " + id);
});

router.on("route:home", function(){
	console.log("HOME");
});

router.on("route:buscar", function(){
	console.log("BUSCAR");
	var buscarView = new BuscarView({});
	buscarView.render();
});

router.on("route:contacto", function(){
	console.log("CONTACTO");
	var contactoView = new ContactoView({});
	contactoView.render();
});

router.on("route:registro", function(){
	console.log("REGISTRO");
	var registroView = new RegistroView({});
	registroView.render();
});

router.on("route:login", function(){
	console.log("LOGIN");
	var loginView = new LoginView({});
	loginView.render();
});

Backbone.history.start();