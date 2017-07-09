<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inicio CSS -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
   <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('static_url') . $css?>" />
    <!-- Fin CSS -->
    <!-- Inicio JS-->
    <script src="<?php echo Configuration::get('static_url') . $js?>" type="text/javascript"></script>
    <!-- Fin JS-->
</head>
<body class="container">
    <script id="home-template" type="text/x-handlebars-template">
        <!-- Inicio Modal -->
        <button type="button" class="btn btn-primary btn-lg oculto" data-toggle="modal" data-target="#modal-container"  id="btnModal" >Launch demo modal</button>
        <div class="modal fade" id="modal-container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
        <!-- Fin Modal -->
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
              </div><!--/.nav-collapse -->
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
    <script type="text/javascript">
        var BASE_URL = '<?php echo Configuration::get('base_url'); ?>';
        var STATICS_URL  = '<?php echo Configuration::get('static_url'); ?>';
        var MODULOS_JSON = JSON.parse('<?php echo $menu;?>');
        var DATA = <?php if ($data != ''){?>JSON.parse('<?php echo "data";?>')<?php }else{?>''<?php }?>; 
    </script>
</body>
</html>