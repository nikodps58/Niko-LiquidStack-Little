<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <meta name="description" content="<?=$description?>">
    <link rel="stylesheet" href="<?=$_ENV['RAIZ']?>/assets/css/inicio.min.css?v=1.1">
    <script type="module" src="<?=$_ENV['RAIZ']?>/assets/js/app.js?v=1.1"></script>
   
    <!-- metadatos de configuración -->    
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <meta name="referrer" content="origin" >
    <link rel="canonical" href="<?=$_ENV['RAIZ']?>/inicio"> <!-- url hasta este archivo -->
</head>
<body>
    <!-- Incluyo el menú -->
    <?php include './php/includes/_nav.php'?>       

    <header>
        <h1><?=$h1?></h1>   
    </header> 

    <?php include './php/includes/_footer.php'?>  
</body>
</html>