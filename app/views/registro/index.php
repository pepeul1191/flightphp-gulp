<div class="col-md-4">
</div>
<div class="col-md-8">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#paso1" aria-controls="paso1" role="tab" data-toggle="tab">PASO 1</a></li>
    <li role="presentation"><a href="#paso2" aria-controls="paso2" role="tab" data-toggle="tab">PASO 2</a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
   <div role="tabpanel" class="tab-pane active" id="paso1"></div>
   <div role="tabpanel" class="tab-pane" id="paso2">
   		PROFILE
   </div>
  </div>
</div>

<script id="paso1-template" type="text/x-handlebars-template">
  	<div class="form-group">
	   <label class="control-label" for="txtUsuario">Nombre de Usuario</label><span style="color:#a94442; margin-left: 10px"></span>
	   <input type="text" class="form-control" id="txtUsuario" placeholder="">
	</div>
	<div class="form-group">
	   <label class="control-label" for="txtCorreo">Correo Electrónico</label><span style="color:#a94442; margin-left: 10px"></span>
	   <input type="email" class="form-control" id="txtCorreo" placeholder="">
	</div>
	<div class="form-group">
	   <label class="control-label" for="txtCorreoRepetir">Repetir Correo Electrónico</label><span style="color:#a94442; margin-left: 10px"></span>
	   <input type="email" class="form-control" id="txtCorreoRepetir" placeholder="">
	</div>
	<div class="form-group">
	   <label class="control-label" for="txtContrasenia">Contraseña</label><span style="color:#a94442; margin-left: 10px"></span>
	   <input type="password" class="form-control" id="txtContrasenia" placeholder="">
	</div>
	<div class="form-group">
	   <label class="control-label" for="txtContraseniaRepetir">Repetir Contraseña</label><span style="color:#a94442; margin-left: 10px"></span>
	   <input type="password" class="form-control" id="txtContraseniaRepetir" placeholder="">
	</div>
	<button type="submit" class="btn btn-default" id="btnGuardarPaso1">Guardar y Pasar al Paso 2</button>
</script>
<script type="text/javascript">
	var Usuario = Backbone.Model.extend({
	   initialize: function() {
         this.usuario_valido = false;
         this.usuario_lleno = false;
         this.correo_valido = false;
         this.contrasenia_valido = false;
         this.valido = false;
      }, 
      validar: function() {
      	if(this.get("usuario_valido") == true && this.get("correo_valido") == true && this.get("contrasenia_valido") == true && this.get("usuario_lleno") == true){
      		this.set({valido : true});
      	}else{
      		this.set({valido : false});
      	}
      },
      toJSON: function() {
      	var usuario = new Object();
			usuario.usuario = $("#txtUsuario").val();
			usuario.contrasenia = $("#txtContrasenia").val();
			usuario.correo = $("#txtCorreo").val();
      	return usuario;
      }
	});

	var Paso1View = Backbone.View.extend({
		el: '#paso1',
		initialize: function(){
	
		},
		events: {
		    "keyup #txtUsuario": "validarUsuarioRepetido", 
		    "focusout #txtUsuario": "validarUsuarioLleno", 
		    "keyup #txtCorreo": "validarCorreoRepetido", 
		    "focusout #txtCorreoRepetir": "validarCorreoIgual", 
		    "focusout #txtContrasenia": "validarContraseniaIgual", 
		    "focusout #txtContraseniaRepetir": "validarContraseniaIgual", 
		    "click #btnGuardarPaso1": "GuardarPaso1"
		},
		render: function() {
			var data = { };
			var source = $('#paso1-template').html();
			var template = Handlebars.compile(source);
			var template_compiled = template(data);
			this.$el.html(template_compiled);

			return this;
		},
		validarUsuarioRepetido: function(event) {
			var usuario_valido_valor;
      	$.ajax({
      		type: "POST",
      		url: BASE_URL + "registro/validar_usuario_repetido",
      		data: "nombre=" + $("#txtUsuario").val(),
      		async: false,
      		success: function(data){
      			if(data >= 1){
      				$("#txtUsuario").parent().addClass("has-error");
      				$("#txtUsuario").parent().find("span").html("El nombre de usuario registrado ya se encuentra en uso");
      				usuario_valido_valor = false;
      			}else{
      				$("#txtUsuario").parent().removeClass("has-error");
      				$("#txtUsuario").parent().find("span").html("");
      				usuario_valido_valor = true;
      			}
      		},
      		error: function(data){
      			//FALTA MANEJAR EL ERROR DEL AJAX
      		}
      	});
      	this.model.set({usuario_valido : usuario_valido_valor});
		},
		validarUsuarioLleno: function(event) {
			if(this.model.get("usuario_valido") != false){
				if($("#txtUsuario").val() == ""){
					$("#txtUsuario").parent().addClass("has-error");
		      	$("#txtUsuario").parent().find("span").html("Debe ingresar un usuario");
		      	this.model.set({usuario_lleno : false});
				}else{
					$("#txtUsuario").parent().removeClass("has-error");
		      	$("#txtUsuario").parent().find("span").html("");
		      	this.model.set({usuario_lleno : true});
				}
			}
		},
		validarCorreoRepetido: function(event) {
			var correo_valido_valor;
      	$.ajax({
      		type: "POST",
      		url: BASE_URL + "registro/validar_correo_repetido",
      		data: "correo=" + $("#txtCorreo").val(),
      		async: false,
      		success: function(data){
      			if(data >= 1){
      				$("#txtCorreo").parent().addClass("has-error");
      				$("#txtCorreo").parent().find("span").html("El correo ya se encuentra asociado a un usuario registrado");
      				correo_valido_valor = false;
      			}else{
      				$("#txtCorreo").parent().removeClass("has-error");
      				$("#txtCorreo").parent().find("span").html("");
      				correo_valido_valor = true;
      			}
      		},
      		error: function(data){
      			//FALTA MANEJAR EL ERROR DEL AJAX
      		}
      	});
      	this.model.set({correo_valido : correo_valido_valor});
		},
		validarCorreoIgual: function(event) {
			if($("#txtCorreoRepetir").val() != ""){
				if($("#txtCorreo").val() != $("#txtCorreoRepetir").val()){
					$("#txtCorreoRepetir").parent().addClass("has-error");
	      		$("#txtCorreoRepetir").parent().find("span").html("El correo ingresado no coincide con el primero");
	      		this.model.set({correo_valido : false});
				}else{
					$("#txtCorreoRepetir").parent().removeClass("has-error");
	      		$("#txtCorreoRepetir").parent().find("span").html("");
	      		this.model.set({correo_valido : true});
				}
			}
			this.validarCorreoFormato();
		}, 
		validarCorreoLleno: function(event) {
			if($("#txtCorreo").val() == ""){
				$("#txtCorreo").parent().addClass("has-error");
      		$("#txtCorreo").parent().find("span").html("Tiene que ingrear un correo");
      		this.model.set({correo_valido : false});
			}
		}, 
		validarContraseniaLleno: function(event) {
			if($("#txtContrasenia").val() == ""){
				$("#txtContrasenia").parent().addClass("has-error");
      		$("#txtContrasenia").parent().find("span").html("Tiene que ingrear su contraseña");
      		this.model.set({correo_valido : false});
			}else{
				$("#txtContrasenia").parent().removeClass("has-error");
      		$("#txtContrasenia").parent().find("span").html("");
      		this.model.set({correo_valido : true});
			}
		}, 
		validarContraseniaIgual: function(event) {
			if($("#txtContrasenia").val() != $("#txtContraseniaRepetir").val()){
				$("#txtContraseniaRepetir").parent().addClass("has-error");
      		$("#txtContraseniaRepetir").parent().find("span").html("La contraseña ingresada no coincide con la primera");
      		this.model.set({contrasenia_valido : false});
			}else{
				$("#txtContraseniaRepetir").parent().removeClass("has-error");
      		$("#txtContraseniaRepetir").parent().find("span").html("");
      		this.model.set({contrasenia_valido : true});
			}
		}, 
		validarCorreoFormato: function(event) {
			   var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			   var rpta = re.test($("#txtCorreo").val());
			   console.log(rpta);
			   if(rpta == false){
			   	$("#txtCorreo").parent().addClass("has-error");
      			$("#txtCorreo").parent().find("span").html("El correo ingresado no es de un formato válido");
			   	this.model.set({contrasenia_valido : false});
			   }else{
			   	$("#txtCorreo").parent().removeClass("has-error");
      			$("#txtCorreo").parent().find("span").html("");
			   	this.model.set({contrasenia_valido : true});
			   }
		}, 
		GuardarPaso1: function(event){
			//this.validarContraseniaIgual();
			this.validarUsuarioLleno();
			this.validarCorreoLleno();
			this.validarContraseniaLleno();
			this.model.validar();
			if(this.model.get("valido") == true){
				console.log(this.model.toJSON());
				/*
				$.ajax({
	      		type: "POST",
	      		url: BASE_URL + "registro/guardar_usuario",
	      		data: "correo=" + $("#txtCorreo").val(),
	      		async: false,
	      		success: function(data){
	      			if(data >= 1){
	      				$("#txtCorreo").parent().addClass("has-error");
	      				$("#txtCorreo").parent().find("span").html("El correo ya se encuentra asociado a un usuario registrado");
	      				correo_valido_valor = false;
	      			}else{
	      				$("#txtCorreo").parent().removeClass("has-error");
	      				$("#txtCorreo").parent().find("span").html("");
	      				correo_valido_valor = true;
	      			}
	      		},
	      		error: function(data){
	      			//FALTA MANEJAR EL ERROR DEL AJAX
	      		}
	      	});
				*/
			}else{
				
			}
		}
	});

	$( document ).ready(function() {
		var usuario = new Usuario();
		var paso1 = new Paso1View({model:usuario});
		paso1.render();
	});
</script>