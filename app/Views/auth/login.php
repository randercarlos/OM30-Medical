<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="<?= base_url('favicon.ico');?>" type="image/png" />

    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->

    <title>Autenticação</title>
    <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/font-awesome.css');?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div style="background-color: #8a1818; height: 150px">
    <div class="container text-center">
        <img src="<?= base_url('assets/img/logo-om30.png'); ?>" alt="Logo"
             style="width: 100px; height: 100px;margin-top: 25px;" />
    </div>
</div>

<div class="content-wrapper">
    <div class="container" style="width: 30%">

        <?= $this->include('includes/alerts') ?>

        <form action="/auth" method="POST">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="email" class="required">Email:</label>
                    <input type="text" class="form-control input-lg" placeholder="Informe seu email..."
                           autocomplete="off" name="email" id="email"/>
                </div>

                <div class="form-group col-md-12">
                    <label for="password" class="required">Senha:</label>
                    <input type="password" class="form-control input-lg" placeholder="Informe sua senha..."
                           autocomplete="off" name="password" id="password" />
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="text-center col-xs-12">
                    <div class="hidden-xs">
                        <button type="submit" class="btn btn-primary btn-block" id="btn-salvar">
                            <i class="fa fa-floppy-o"></i> <span>Logar</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>