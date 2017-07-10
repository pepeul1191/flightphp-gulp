<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
   <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('static_url') . $css?>" />
</head>
<body>
    <!-- Inicio Modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-container"  id="btnModal" style="display: none" >Launch demo modal</button>
    <div class="modal fade" id="modal-container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
    <!-- Fin Modal -->
     <!-- Inicio App -->
    <div id="header-app"></div>
    <div id="body-app"></div>
    <footer class="footer" style="position: absolute; bottom: 0; width: 100%; height: 60px; background-color: #f5f5f5; ">
        <p class="text-muted" style="margin: 20px 0; margin-left: 15px;">Place sticky footer content here.</p>
    </footer>
     <!-- Fin App -->
    <script id="home-template" type="text/x-handlebars-template">
            <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Servicio de Monta</a>
              </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    {{> menu_modulos}}
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../navbar-fixed-top/">Login</a></li>
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
    <script id="BuscarTemplate" type="text/x-handlebars-template">
            <h1>BUSCAR</h1>
    </script>
    <script id="ConcatoTemplate" type="text/x-handlebars-template">
            <h1>CONTACTO</h1>
    </script>
    <script type="text/javascript">
        var BASE_URL = '<?php echo Configuration::get('base_url'); ?>';
        var STATICS_URL  = '<?php echo Configuration::get('static_url'); ?>';
        var MODULOS_JSON = JSON.parse('<?php echo $menu;?>');
        var DATA = <?php if ($data != ''){?>JSON.parse('<?php echo "data";?>')<?php }else{?>''<?php }?>; 
    </script>
    <script src="<?php echo Configuration::get('static_url') . $js?>" type="text/javascript"></script>
</body>
</html>