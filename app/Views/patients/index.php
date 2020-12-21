<?= $this->extend('templates/app'); ?>


<?= $this->section('main_title') ?>
    <?= esc($title); ?>
<?= $this->endSection() ?>


<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" />
<?= $this->endSection() ?>


<?= $this->section('content') ?>

    <?= $this->include('includes/alerts') ?>

    <p class="text-right">
        <a href="" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i> Cadastrar Novo
        </a>
    </p>


    <table class="table table-striped table-bordered" id="tb1">
    <tr>
        <th width="130px" class="text-center">Foto</th>
        <th>Paciente</th>
        <th>Nome da Mãe</th>
        <th width="80px" class="text-center">Data Nasc.</th>
        <th width="120px" class="text-center">CPF</th>
        <th width="110px" class="text-center">CNS</th>
        <th class="text-center" width="100px">
            <i class="fa fa-cog"></i>
        </th>
    </tr>


    <?php if (! empty($patients) && is_array($patients)) : ?>

        <?php foreach ($patients as $patient): ?>
            <tr>
                <td class="text-center">
                    <img src="<?php echo !empty($patient['photo']) ? base_url('assets/uploads/patients' .
                        esc($patient['photo'])) : base_url('assets/img/default_avatar.jpg'); ?>"
                        style='width: 100px; height: 100px' />
                </td>
                <td style="vertical-align: middle;"> <?= esc($patient['fullname']); ?></td>
                <td style="vertical-align: middle;"> <?= esc($patient['mother_fullname']); ?></td>
                <td style="vertical-align: middle;" class="text-center"> <?= date_format(date_create($patient['birthday']), 'd/m/Y'); ?></td>
                <td style="vertical-align: middle;" class="text-center"> <?= esc($patient['cpf']); ?></td>
                <td style="vertical-align: middle;" class="text-center"> <?= esc($patient['cns']); ?></td>
                <td class="text-center" style="vertical-align: middle;">

                    <a href="/patients/edit/<?= esc($patient['id']); ?>" class="btn btn-primary btn-sm"
                        data-toggle="tooltip" title="Editar">
                        <i class="fa fa-edit"></i>
                    </a>

                    <button data-link="/patients/delete/<?= esc($patient['id']); ?>" data-toggle="tooltip" title="Remover"
                            data-resource="<?= esc($patient['id']); ?>" class="btn btn-danger btn-sm btn-remover">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan='6' style='text-align: center;'>Nenhum paciente encontrado!</td>
        </tr>
    <?php endif ?>
    </table>

    <div class="row">
        <div class="col-md-12 text-center">
            <?= $pager->links() ?>
        </div>
    </div>

    <?= $this->include('includes/modal_delete') ?>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
    <!-- inclui o javascript necessário para exiber o modal para confirmação da exclusão  -->
    <script type="text/javascript" src="<?= base_url('assets/js/app.js');?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<?= $this->endSection() ?>
