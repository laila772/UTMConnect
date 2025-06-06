

<?php $__env->startSection('content'); ?>

<head>
    <title>Completed Programs</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/completedPrograms.css')); ?>">
</head>

<div class="navbar">
    <a href="#">PERSAKA CLUB</a>
    <div class="float-end">
        <a href="<?php echo e(route('admin')); ?>" class="me-3">Homepage</a>
        <a href="<?php echo e(route('program.create')); ?>" class="me-3">Add Program</a>
        <a href="<?php echo e(route('completedPrograms.index')); ?>" class="me-3">Latest Program</a>
        <a href="<?php echo e(route('participants.index')); ?>" class="me-3">Participant List</a>
        <a href="<?php echo e(route('logout')); ?>" class="btn">Logout</a>
    </div>
</div>

<div class="container mt-5">
    <h2 class="section-title">Completed Programs</h2>
    <div class="event-container">
        <?php $__currentLoopData = $completedPrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="event-card">
            <img src="<?php echo e(asset($program->poster)); ?>" alt="Program Poster" class="event-image">

            <div class="event-date-status">
                <div class="event-date"><?php echo e(\Carbon\Carbon::parse($program->date)->format('d M Y')); ?></div>
                <div class="event-status">Completed</div>
            </div>

            <div class="event-details">
                <div class="event-title"><?php echo e($program->title); ?></div>
                <p><?php echo e($program->description); ?></p>
                <hr>
                <div class="event-meta">
                    <p><strong>Location:</strong> <?php echo e($program->location); ?></p>
                    <p><strong>Time:</strong> <?php echo e($program->time); ?></p>
                </div>

                <div class="mt-4">
                    <form method="POST" action="<?php echo e(route('completedPrograms.destroy', $program->id)); ?>" onsubmit="return confirm('Are you sure you want to delete this program?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fyp2\UTMConnect+\resources\views/completedPrograms/index.blade.php ENDPATH**/ ?>