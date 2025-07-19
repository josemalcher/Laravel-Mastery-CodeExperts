<?php $__env->startSection('title'); ?>
    Evento - <?php echo e($event->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <h2>Evento: <?php echo e($event->title); ?></h2>
            <strong>Acontece em: <?php echo e($event->start->format('d/m/Y H:i:s')); ?></strong>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#sobre" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                </li>
                <?php if($event->photos->count()): ?>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="profile" aria-selected="false">Fotos</a>
                </li>
                <?php endif; ?>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active pt-3" id="sobre" role="tabpanel" aria-labelledby="home-tab">
                    <p><?php echo e($event->description); ?></p>
                </div>
                <?php if($event->photos->count()): ?>
                <div class="tab-pane fade pt-3" id="fotos" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <?php $__currentLoopData = $event->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-3">
                                <img src="<?php echo e($photo->photo); ?>" alt="<?php echo e($event->title); ?>" class="img-fluid">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/event.blade.php ENDPATH**/ ?>