<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">

        </div>
    </div>

    <div class="row mb-4">
        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-4">
                <div class="card">
                    <img src="https://via.placeholder.com/640x480.png/00dd99?text=omnis" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($event->title); ?></h5>
                        <strong>Acontece em: <?php echo e($event->start->format('d/m/Y H:i:s')); ?></strong>
                        <p class="card-text"><?php echo e($event->description); ?></p>
                        <a href="<?php echo e(route('event.single', ['slug'=> $event->slug])); ?>" class="btn btn-info">Ver Evento</a>
                    </div>
                </div>
            </div>
            <?php if(( $loop->iteration % 3) == 0 ): ?> </div> <div class="row mb-4"> <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="alert alert-warning">Nenhum evento encontrado neste site....</div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/welcome.blade.php ENDPATH**/ ?>