<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inicio CSS -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
   <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('static_url') . $css?>" />
    <!-- Fin CSS -->
</head>
<body class="container">
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
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Buscar</a></li>
              <li><a href="#">Contacto</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../navbar-fixed-top/">Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

    <?php echo $partial; ?>
    <!-- Inicio JS-->
    <script src="<?php echo Configuration::get('static_url') . $js?>" type="text/javascript"></script>
    <!-- Fin JS-->
</body>
</html>