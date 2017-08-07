/*
Archivos que usa :
	+ views/buscar.js
	+ views/contacto.js
	+ views/registro.js
	+ views/login.js
*/

const RootView = Marionette.View.extend({
	template: _.template('<h1>Marionette says hello!</h1>')
});

var Router = Marionette.AppRouter.extend({
routes: {
    'email/:email': 'showEmail',
	"buscar" : "showBuscar",
	"contacto" : "showContacto",
	"registro" : "showRegistro",
	"login" : "showLogin", 
	"" : "showHome", 
	"*actions" : "showHome"
  },
  showEmail: function(email) {
    // show the email
    alert(email);
  },
  	showHome: function(){
		var homeView = new HomeView({});
		homeView.render();
	},
	showBuscar: function(){
		var buscarView = new BuscarView({});
		buscarView.render();
	},
	showContacto: function(){
		var contactoView = new ContactoView({});
		contactoView.render();
	},
	showRegistro: function(){
		var registroView = new RegistroView({});
		registroView.render();
	},
	showLogin: function(){
		var loginView = new LoginView({});
		loginView.render();
	}
});

const App = Marionette.Application.extend({
  region: '#body-app',
  onStart() {
  	var router = new Router();
   Backbone.history.start();
  }
});

const myApp = new App();
myApp.start();

/*
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
	//console.log("HOME");
	var homeView = new HomeView({});
	homeView.render();
});

router.on("route:buscar", function(){
	//console.log("BUSCAR");
	var buscarView = new BuscarView({});
	buscarView.render();
});

router.on("route:contacto", function(){
	//console.log("CONTACTO");
	var contactoView = new ContactoView({});
	contactoView.render();
});

router.on("route:registro", function(){
	//console.log("REGISTRO");
	var registroView = new RegistroView({});
	registroView.render();
});

router.on("route:login", function(){
	//console.log("LOGIN");
	var loginView = new LoginView({});
	loginView.render();
});

Backbone.history.start();
*/
