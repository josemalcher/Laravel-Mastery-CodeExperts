<?php $__env->startSection('title'); ?>
    Meus Eventos -
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Meus Eventos</h2>
            <a href="/admin/events/create" class="btn btn-success">Criar evento</a>
        </div>
        <div class="col-12">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($event->id); ?></td>
                        <td><?php echo e($event->title); ?></td>
                        <td><?php echo e($event->created_at->format('d/m/Y H:i:s')); ?></td>
                        <td>
                            <a href="/admin/events/<?php echo e($event->id); ?>/edit" class="btn btn-warning">Editar</a>
                            <a href="/admin/events/destroy/<?php echo e($event->id); ?>" class="btn btn-danger">REMOVER</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3">Nenhum Evento Encontrado</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <?php echo e($events->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/events/index.blade.php ENDPATH**/ ?>