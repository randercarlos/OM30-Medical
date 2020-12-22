<?= $this->extend('templates/app'); ?>


<?= $this->section('main_title') ?>
    <?= esc($title); ?>
<?= $this->endSection() ?>


<?= $this->section('styles') ?>
    <style type="text/css">

    </style>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

    <?= $this->include('includes/errors') ?>

    <?php if (isset($patient)): ?>
        <?= form_open_multipart('patients/update/' . $patient->id); ?>
    <?php else: ?>
        <?= form_open_multipart('patients/create'); ?>
    <?php endif; ?>

    <div class="row">

        <div class="form-group col-md-6">
            <label for="fullname" class="required">Nome Completo:</label>
            <input type="text" name="fullname" id="fullname" class="form-control altura" maxlength="100" <?= $mode ?? ''; ?>
                   placeholder="Informe o nome completo do paciente" value="<?= old('fullname') ?? $patient->fullname ?? '' ?>" />
        </div>

        <div class="form-group col-md-6">
            <label for="mother_fullname" class="required">Nome Completo da Mãe:</label>
            <input type="text" name="mother_fullname" id="mother_fullname" class="form-control altura" maxlength="100" <?= $mode ?? ''; ?>
                   placeholder="Informe o nome completo do mãe do paciente" value="<?= old('mother_fullname') ?? $patient->mother_fullname ?? '' ?>" />
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-4">
            <label for="cpf" class="required">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control altura" maxlength="14" <?= $mode ?? ''; ?>
                   placeholder="Informe o CPF do paciente" value="<?= old('cpf') ?? $patient->cpf ?? '' ?>" />
        </div>

        <div class="form-group col-md-4">
            <label for="cns" class="required">CNS:</label>
            <input type="text" name="cns" id="cns" class="form-control altura" maxlength="18" <?= $mode ?? ''; ?>
                   placeholder="Informe o CNS do paciente" value="<?= old('cns') ?? $patient->cns ?? '' ?>" />
        </div>

        <div class="form-group col-md-4">
            <label for="birthday" class="required">Data de Nascimento:</label>
            <input type="date" name="birthday" id="birthday" class="form-control altura" maxlength="10" <?= $mode ?? ''; ?>
                   placeholder="Informe a data de nascimento do paciente" value="<?= old('birthday') ?? (isset($patient) ? $patient->getFormattedBirthday() : '') ?>" />
        </div>

    </div>


    <div class="row">

        <div class="form-group col-md-2">
            <label for="cep" class="required">CEP:</label>
            <input type="text" name="cep" id="cep" class="form-control altura" maxlength="9" <?= $mode ?? ''; ?>
                   placeholder="Informe o CEP do paciente" value="<?= old('cep') ?? $patient->cep ?? '' ?>" />
        </div>

        <div class="form-group col-md-8">
            <label for="address" class="required">Endereço:</label>
            <input type="text" name="address" id="address" class="form-control altura" maxlength="250" readonly <?= $mode ?? ''; ?>
                   placeholder="Informe o CEP para preencher o endereço do paciente" value="<?= old('address') ?? $patient->address ?? '' ?>" />
        </div>

        <div class="form-group col-md-2">
            <label for="number" class="required">Nº:</label>
            <input type="text" name="number" id="number" class="form-control altura" maxlength="10" <?= $mode ?? ''; ?>
                   placeholder="Informe o nº onde o paciente mora" value="<?= old('number') ?? $patient->number ?? '' ?>" />
        </div>
    </div>

    <div class="row">

        <div class="form-group col-md-4">
            <label for="complement">Complemento:</label>
            <input type="text" name="complement" id="complement" class="form-control altura" maxlength="250" <?= $mode ?? ''; ?>
                   placeholder="Informe o complemento onde o paciente mora" value="<?= old('complement') ?? $patient->complement ?? '' ?>" />
        </div>

        <div class="form-group col-md-3">
            <label for="neighborhood" class="required">Bairro:</label>
            <input type="text" name="neighborhood" id="neighborhood" class="form-control altura" maxlength="60" readonly <?= $mode ?? ''; ?>
                   placeholder="Informe o CEP para preencher o bairro do paciente" value="<?= old('neighborhood') ?? $patient->neighborhood ?? '' ?>" />
        </div>

        <div class="form-group col-md-3">
            <label for="city" class="required">Cidade:</label>
            <input type="text" name="city" id="city" class="form-control altura" maxlength="60" readonly <?= $mode ?? ''; ?>
                   placeholder="Informe o CEP para preencher a cidade do paciente" value="<?= old('city') ?? $patient->city ?? '' ?>" />
        </div>

        <div class="form-group col-md-2">
            <label for="state" class="required">Estado:</label>
            <input type="text" name="state" id="state" class="form-control altura" maxlength="2" readonly <?= $mode ?? ''; ?>
                   placeholder="Informe o CEP para preencher o estado do paciente" value="<?= old('state') ?? $patient->state ?? '' ?>" />
        </div>

        <input type="hidden" name="id" id="id" value="<?= old('id') ?? $patient->id ?? '' ?>" />
    </div>

    <?php if (!isset($mode)): ?>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <span class="btn btn-black btn-file col-xs-12 col-md-4 ">
                <i class="fa fa-cloud-upload"></i>
                Selecione um Foto <?= isset($patient) ? '(se quiser substituir a atual)' : '' ?>
                <input type="file" name="photo" id="photo" accept="image/gif, image/jpeg, image/png" />
            </span>

            &nbsp; &nbsp; &nbsp;

            <span class="text-muted" style="line-height: 50px">Máximo de 150px para Largura e altura! Somente imagens(jpg/jpeg, png, gif) são permitidas! Tamanho máximo: 64kb</span>
        </div>
    </div>
    <?php endif; ?>

    <br/>

    <div class="row">
        <div class="col-md-12">

            <div class="preview_img">
                <h3></h3>
                <img id="preview-img" src="<?= isset($patient) ? $patient->getPhotoFile() : '#' ?>" alt="Upload" />
<!--                <button type="button" class="btn btn-link" id="btn-remove-upload">-->
<!--                    <i class="fa fa-times"></i> <span>Remover Upload</span>-->
<!--                </button>-->
            </div>

        </div>

    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="text-right col-xs-12">
            <div class="hidden-xs">

                <a href="/patients" class="btn btn-warning">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Voltar a Listagem de Pacientes
                </a>

                <?php if (!isset($mode)): ?>
                <button type="submit" class="btn btn-primary" id="btn-salvar">
                    <i class="fa fa-floppy-o"></i> <span>Salvar Paciente</span>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (!isset($mode)): ?>
    <div class="row" style="margin-top: 20px;">
        <div class="col-xs-12">
            <span class="required"></span> <span style="font-size: 16px;">Campo é obrigatório!</span>
        </div>
    </div>
    <?php endif; ?>

    <?= form_close(); ?>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.masked.input.min.js');?>"></script>
    <script type="text/javascript">

        <?php if (isset($patient)): ?>
            showPreviewImage('<?= isset($patient) ? $patient->getPhotoFile() : '' ?>');
        <?php endif; ?>

        $(document).ready(function() {
            $('#cep').mask('99999-999', {placeholder: "_"});
            $('#cpf').mask('999.999.999-99', {placeholder: "_"});
            $('#cns').mask('999 9999 9999 9999', {placeholder: "_"});

            $('#cep').keypress(function() {

                var cep = $(this).val().replace('_', '').replace('-', '');
                if (cep.length === 8) {
                    $('#address').val('carregando...');
                    $('#neighborhood').val('carregando...');
                    $('#city').val('carregando...');
                    $('#state').val('carregando...');
                    $.get( "https://viacep.com.br/ws/" + cep + "/json/", function( data ) {
                        $('#address').val(data.logradouro);
                        $('#neighborhood').val(data.bairro);
                        $('#city').val(data.localidade);
                        $('#state').val(data.uf);
                    });
                }
            });

        });

    </script>
<?= $this->endSection() ?>
