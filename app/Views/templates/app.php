<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="shortcut icon" href="<?= base_url('favicon.ico');?>" type="image/png" />

    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->

    <title> Área Administrativa </title>

    <link href="<?= base_url('assets/css/bootswatch.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font-awesome.css');?>" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?= $this->renderSection('styles') ?>

    <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet" />
</head>
<body>

<!-- INCLUI O MENU -->
<?= $this->include('templates/menu') ?>


<div class="container-fluid back">
    <div class="container text-center">
        <h4 class="page-head-line titulo"> <?= $this->renderSection('main_title') ?> </h4>
    </div>
</div>

<div class="content-wrapper">
    <div class="container" style="width: 80%">

        <?= $this->renderSection('content') ?>

    </div>
</div>


<footer>
    <div class="container">
        <div class="text-center">
            <span style='font-size: 14px'>Desenvolvido por Rander Carlos. Copyright © <?php echo date('Y'); ?></span>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?= base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/app.js'); ?>"></script>

<?= $this->renderSection('scripts') ?>

</body>
</html>
