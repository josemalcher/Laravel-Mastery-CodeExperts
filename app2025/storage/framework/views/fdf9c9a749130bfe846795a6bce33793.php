<?php $__env->startSection('title'); ?>
    Cadastar um novo Evento
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-12 my-5">
        <h2>Criar Evento</h2>
    </div>
</div>

    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('admin.event.create')); ?>" method="post">

                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="">Titulo do Evento</label>
                    <input type="text"class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text"class="form-control" name="description">
                </div>

                <div class="form-group">
                    <label for="">Mais detalhes sobre o Evento</label>
                    <textarea class="form-control" name="body" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Data do Evento</label>
                    <input type="text"class="form-control" name="start">
                </div>
                <div class="form-group">
                    <label for="">Final do Evento</label>
                    <input type="text"class="form-control" name="end">
                </div>
                <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/events/create.blade.php ENDPATH**/ ?>