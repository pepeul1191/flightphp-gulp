EstacionModel = Backbone.Model.extend({
	defaults:{
		nombre : "Estación de monitoreo",
		latitud : "-11",
		longitud : "-11"
	},
	initialize: function(){
		
	}
});

var HomeView = Backbone.View.extend({
	el: '#body-app',
	initialize: function(){
		//this.render();
		console.log("initialize");
	},
	render: function() {
		var data = { };
		var source = $('#paso1-template').html();
		var template = Handlebars.compile(source);
		var template_compiled = template(data);
		console.log("RENDER???? 2");
		this.$el.html(template_compiled);
		console.log("RENDER???? 1");
		 return this;
	}
});

var BuscarView = Backbone.View.extend({
	el: '#body-app',
	initialize: function(){
		//this.render();
		console.log("initialize");
	},
	render: function() {
		var data = { };
		var source = $('#BuscarTemplate').html();
		var template = Handlebars.compile(source);
		var template_compiled = template(data);
		console.log("RENDER???? 2");
		this.$el.html(template_compiled);
		console.log("RENDER???? 1");
		 return this;
	}
});

var ContactoView = Backbone.View.extend({
	el: '#body-app',
	initialize: function(){
		//this.render();
		console.log("initialize");
	},
	render: function() {
		var data = { };
		var source = $('#ConcatoTemplate').html();
		var template = Handlebars.compile(source);
		var template_compiled = template(data);
		console.log("RENDER???? 2");
		this.$el.html(template_compiled);
		console.log("RENDER???? 1");
		 return this;
	}
});

var LoginView = Backbone.View.extend({
	el: '#modal-container',
	initialize: function(){
		//this.render();
		console.log("initialize");
	},
	render: function(){
		$("#btnModal").click(); 
		this.$el.html(this.getTemplate());
	}, 
	getTemplate: function() {
		var data = { };
		var template_compiled = null;
		$.ajax({
		   url: STATICS_URL + 'templates/login.html', 
		   type: "GET", 
		   async: false, 
		   success: function(source) {
		   	var template = Handlebars.compile(source);
		   	template_compiled = template(data);
		   }
		});
		return template_compiled;
	}
});

var RegistroView = Backbone.View.extend({
	el: '#body-app',
	initialize: function(){
		//this.render();
		console.log("initialize");
	},
	render: function(){
		this.$el.html(this.getTemplate());
	}, 
	getTemplate: function() {
		var data = { };
		var template_compiled = null;
		$.ajax({
		   url: STATICS_URL + 'templates/registro.html', 
		   type: "GET", 
		   async: false, 
		   success: function(source) {
		   	var template = Handlebars.compile(source);
		   	template_compiled = template(data);
		   }
		});
		$.getScript( STATICS_URL + "/assets/registro/js/index.js", function( data, textStatus, jqxhr ) { });

		return template_compiled;
	}
});

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

$(document).ready(function(){
	//var estacion = new EstacionModel();
	//console.log(estacion.get("nombre"));
});