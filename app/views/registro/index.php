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
  	<form id="registro_paso_1_form">
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
		   <label for="txtConstrasenia">Contraseñaa</label><span style="color:#a94442; margin-left: 10px"></span>
		   <input type="password" class="form-control" id="txtConstrasenia" placeholder="">
		</div>
		<div class="form-group">
		   <label for="txtContraseniaRepetir">Repetir Contraseña</label>
		   <input type="password" class="form-control" id="txtContraseniaRepetir" placeholder="">
		</div>
		<button type="submit" class="btn btn-default" id="btnGuardarPaso1">Guardar y Pasar al Paso 2</button>
	</form>
</script>
<script type="text/javascript">
	var Usuario = Backbone.Model.extend({
	   initialize: function() {
         //console.log("UsuarioModel");
         this.valido = false;
      }
	});

	var Paso1View = Backbone.View.extend({
		el: '#paso1',
		initialize: function(){
	
		},
		events: {
		    "keyup #txtUsuario": "validarUsuarioRepetido", 
		    "keyup #txtCorreo": "validarCorreoRepetido", 
		    "focusout #txtCorreoRepetir": "validarCorreoIgual", 
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
      	$.ajax({
      		type: "POST",
      		url: BASE_URL + "registro/validar_usuario_repetido",
      		data: "nombre=" + $("#txtUsuario").val(),
      		async: false,
      		success: function(data){
      			if(data >= 1){
      				$("#txtUsuario").parent().addClass("has-error");
      				$("#txtUsuario").parent().find("span").html("El nombre de usuario registrado ya se encuentra en uso");
      			}else{
      				$("#txtUsuario").parent().removeClass("has-error");
      				$("#txtUsuario").parent().find("span").html("");
      			}
      		},
      		error: function(data){
      			//FALTA MANEJAR EL ERROR DEL AJAX
      		}
      	});
		},
		validarCorreoRepetido: function(event) {
      	$.ajax({
      		type: "POST",
      		url: BASE_URL + "registro/validar_correo_repetido",
      		data: "correo=" + $("#txtCorreo").val(),
      		async: false,
      		success: function(data){
      			if(data >= 1){
      				$("#txtCorreo").parent().addClass("has-error");
      				$("#txtCorreo").parent().find("span").html("El correo ya se encuentra asociado a un usuario registrado");
      			}else{
      				$("#txtCorreo").parent().removeClass("has-error");
      				$("#txtCorreo").parent().find("span").html("");
      			}
      		},
      		error: function(data){
      			//FALTA MANEJAR EL ERROR DEL AJAX
      		}
      	});
		},
		validarCorreoIgual: function(event) {
			if($("#txtCorreo").val() != $("#txtCorreoRepetir").val()){
				$("#txtCorreoRepetir").parent().addClass("has-error");
      		$("#txtCorreoRepetir").parent().find("span").html("El correo ingresado no coincide con el primero");
			}else{
				$("#txtCorreoRepetir").parent().removeClass("has-error");
      		$("#txtCorreoRepetir").parent().find("span").html("");
			}
		}
	});

	$( document ).ready(function() {
		var usuario = new Usuario();
		var paso1 = new Paso1View({model:usuario});
		paso1.render();
	});

</script>