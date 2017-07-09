EstacionModel = Backbone.Model.extend({
	defaults:{
		nombre : "Estación de monitoreo",
		latitud : "-11",
		longitud : "-11"
	},
	initialize: function(){
		
	}
});

var ApplicationRouter = Backbone.Router.extend({
	routes : {
		"students/:id" : "getStudent",
		"teachers/:id" : "getTeacher",
		"buscar" : "buscar",
		"contacto" : "contacto",
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
});

router.on("route:contacto", function(){
	console.log("CONTACTO");
});

Backbone.history.start();

$(document).ready(function(){
	var estacion = new EstacionModel();
	console.log(estacion.get("nombre"));
});