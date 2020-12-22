<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger">
        <?php foreach (session()->getFlashdata('errors') as $field => $error) : ?>
            <p><?= $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>