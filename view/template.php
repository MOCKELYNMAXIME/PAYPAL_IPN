<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $constante->NOM_SITE; ?></title>
    <link rel="stylesheet" href="<?= $redirect->getUrl(array('css/')); ?>bootstrap.css">
    <link rel="stylesheet" href="<?= $redirect->getUrl(array('css/')); ?>bootstrap-theme.css">
    <link rel="stylesheet" href="<?= $redirect->getUrl(array('css/')); ?>starter-template.css">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<?= $redirect->getUrl(array('images', 'logo/')); ?>logo.png" class="img-responsive" style="position: relative; top:-12px;">
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if(isset($_GET['view']) && $_GET['view'] == 'index'){echo 'class="active"';} ?>><a href="index.php?view=index">Accueil</a></li>
                <li <?php if(isset($_GET['view']) && $_GET['view'] == 'checkout'){echo 'class="active"';} ?>><a href="index.php?view=checkout">Effectuer Un Paiement</a></li>
                <li <?php if(isset($_GET['view']) && $_GET['view'] == 'stat'){echo 'class="active"';} ?>><a href="index.php?view=stat">Statistique</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container clearfix">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <img src="<?= $redirect->getUrl(array('images', 'logo/')); ?>logo_grd.png" alt="">
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?= $content; ?>

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script src="<?= $redirect->getUrl(array('js/')); ?>bootstrap.js"></script>
<script src="<?= $redirect->getUrl(array('js/')); ?>paypal.js"></script>
</body>
</html>