<div>
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
		   <label for="txtUsuario">Nombre de Usuario</label>
		   <input type="text" class="form-control" id="txtUsuario" placeholder="">
		</div>
		<div class="form-group">
		   <label for="txtCorreo">Correo Electrónico</label>
		   <input type="email" class="form-control" id="txtCorreo" placeholder="">
		</div>
		<div class="form-group">
		   <label for="txtCorreoRepetir">Repetir Correo Electrónico</label>
		   <input type="email" class="form-control" id="txtCorreoRepetir" placeholder="">
		</div>
		<div class="form-group">
		   <label for="txtConstrasenia">Contraseñaa</label>
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
		    "keyup #txtUsuario": "validarUsuarioRepetido"
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
      	var textoUsuario = this.nombre;
      	$.ajax({
      		type: "POST",
      		url: BASE_URL + "registro/validar_usuario_repetido",
      		data: "nombre=" + $("#txtUsuario").val(),
      		async: false,
      		success: function(data){
      			if(data == 1){
      				$("#txtUsuario").css("color", "red"); $("#txtUsuario").css("border-color", "red");
      			}else{
      				$("#txtUsuario").css("color", ""); $("#txtUsuario").css("border-color", "");
      			}
      		},
      		error: function(data){

      		}
      	});
		}
	});

	$( document ).ready(function() {
		var usuario = new Usuario();
		var paso1 = new Paso1View({model:usuario});
		paso1.render();
	});

</script>