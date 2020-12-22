<nav class="navbar navbar-default" style="background-color: #8a1818; font-size: large;">
    <div class="container-fluid">
        <div class="container">

            <div class="container text-center">
                <img src="<?= base_url('assets/img/logo-om30.png'); ?>" alt="Logo"
                     style="width: 150px; height: 120px;margin-top: 25px;" />
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="menu-top">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 0.8em;">
                            <i class="fa fa-car"></i> Pacientes
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a id="menu-auto" href="/patients">
                                    <i class="fa fa-th-list"></i> Listar Pacientes
                                </a>
                            </li>
                            <li>
                                <a id="menu-marca" href="/patients/new">
                                    <i class="fa fa-plus-circle"></i> Cadastrar Novo Paciente</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="/logout" class="dropdown-toggle text-uppercase" style="color: #fff; font-size: 0.8em;">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Sair
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div><!-- /.container-fluid -->
</nav>