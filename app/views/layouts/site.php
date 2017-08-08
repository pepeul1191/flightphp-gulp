<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
   <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('static_url') . $css?>" />
    <script type="text/javascript">
        var BASE_URL = '<?php echo Configuration::get('base_url'); ?>';
        var STATICS_URL  = '<?php echo Configuration::get('static_url'); ?>';
        var MODULOS_JSON = JSON.parse('<?php echo $menu;?>');
        var DATA = <?php if ($data != ''){?>JSON.parse('<?php echo "data";?>')<?php }else{?>''<?php }?>; 
    </script>
   <style type="text/css"></style>
</head>
<body>
    <!-- Inicio Modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-container"  id="btnModal" style="display: none" >Launch demo modal</button>
    <div class="modal fade" id="modal-container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
    <!-- Fin Modal -->
     <!-- Inicio App -->
    <div id="header-app"></div>
    <div id="body-app"></div>
    <div id="contacto">
          <div class="contact-us">
               <div class="container">
                  <h1 class="titulo-seccion">CONTACTO</h1>
                  <div class="contact-form">
                   <div class="row">
                       <div class="col-sm-6">                  
                                <div class="messages" id="form-messages"></div>
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">Nombre(s) *</label>
                                                <input id="form_name" type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_lastname">Apellido(s) *</label>
                                                <input id="form_lastname" type="text" name="surname" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">Correo Electrónico *</label>
                                                <input id="form_email" type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_phone">Teléfono </label>
                                                <input id="form_phone" type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Mensaje *</label>
                                                <textarea id="form_message" name="message" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary">Enviar Mensaje</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                           <br>
                                            <small class="text-muted"><strong>*</strong> Campos requeridos.</small>
                                        </div>
                                    </div>
                                </div>
                       </div>
                       <div class="col-sm-6">
                           <div class="row col1">
                               <div class="col-xs-5">
                                   <i class="fa fa-map-marker" style="font-size:16px;"></i>   Dirección
                               </div>
                               <div class="col-xs-7">
                                    One Gateway Center, Suite 25500+,<br> Newark 23, NJ 10235
                               </div>
                           </div>
                           
                            <div class="row col1">
                                <div class="col-sm-5">
                                    <i class="fa fa-phone"></i>   Teléfono
                                </div>
                                <div class="col-sm-7">
                                     +(91) 123 277 4239
                                </div>
                            </div>
                            <div class="row col1">
                                <div class="col-sm-5">
                                     <i class="fa fa-fax"></i>    Fax  
                                </div>
                                <div class="col-sm-7">
                                      123 123 4567
                                </div>
                            </div>
                            <div class="row col1">
                                <div class="col-sm-5">
                                    <i class="fa fa-envelope"></i>   Correo Electrónico
                                </div>
                                <div class="col-sm-7">
                                     <a href="mailto:info@yourdomain.com">info@yourdomain.com</a> <br> <a href="mailto:support@yourdomain.com">support@yourdomain.com</a>
                                </div>
                            </div><br>
                            <iframe width="100%" height="230" frameborder="0" style="border-radius:0px;" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?client=firefox-a&ie=UTF8&q=ethane+web+technologies&fb=1&gl=in&hq=ethane+web+technologies&cid=8183905562449910042&t=m&ll=28.639225,77.390442&spn=0.052731,0.154495&z=13&iwloc=A&output=embed"  style="border-radius:20px;"></iframe>
                       </div>
                   </div>
                  </div>
               </div>
           </div>
     </div>
     <footer>
            <div class="container">Sitio desarrollado y soportado por Software Web Perú - <a href="http://softweb.pe/">Ir</a></div>
    </footer>
     <!-- Fin App -->
    <script id="header-template" type="text/x-handlebars-template">
            <nav class="navbar navbar-default">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                <div class="icon icon-chiguagua icon-brand"></div>
                <span>Servicio de Monta</span>
                </a>
              </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    {{> menu_modulos}}
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{BASE_URL}}#/registro">Registrarse</a></li>
                        <li><a href="{{BASE_URL}}#/login">Login</a></li>
                    </ul>
                </div>
              <!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        {{> yield}}
    </script>
    <script id="menu-modulos" type="text/x-handlebars-template">
        {{{menuModulos}}}
    </script>
    <script id="yield" type="text/x-handlebars-template">
        <!-- Inicio yield-->
        <?php echo $partial; ?>
        <!-- Fin yield-->
    </script>
    <script src="<?php echo Configuration::get('static_url') . $js?>" type="text/javascript"></script>
</body>
</html>