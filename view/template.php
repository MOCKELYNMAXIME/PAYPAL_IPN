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
</head>
<body>

<script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk=" crossorigin="anonymous"></script>
<script src="<?= $redirect->getUrl(array('js/')); ?>bootstrap.js"></script>
<script src="<?= $redirect->getUrl(array('js/')); ?>paypal.js"></script>
</body>
</html>