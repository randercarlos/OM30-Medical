
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success msg-status">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>


<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger msg-status">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>


<?php if (session()->getFlashdata('info')): ?>
    <div class="alert alert-info msg-status">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo session()->getFlashdata('info'); ?>
    </div>
<?php endif; ?>