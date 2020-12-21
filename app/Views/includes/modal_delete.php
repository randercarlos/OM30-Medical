
    <div id="pageNav" class="text-center" ></div>

    <div class="modal fade" id="modal-remover">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h4 class="modal-title">Remover Paciente</h4>
                </div>

                <div class="modal-body">
                    <p>Deseja realmente remover esse paciente ?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn btn-danger" id="link-remover">Remover</a>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


     <!-- Formulário necessário para se excluir um registro via método DELETE. Recebe a variável $route como
        parâmetro -->
    <form method="POST" action="" accept-charset="UTF-8" id="form_delete">
        <?= csrf_field() ?>
    </form>