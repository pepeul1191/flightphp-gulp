<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
   <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('static_url') . $css?>" />
   <style type="text/css"></style>
</head>
<body>
    <?php echo $partial; ?>
    <script src="<?php echo Configuration::get('static_url') . $js?>" type="text/javascript"></script>
</body>
</html>