

<?php $__env->startSection('content'); ?>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
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
    <h2 class="section-title">Upcoming Events</h2>

    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="event-container">
        <div class="event-date">
            <div><?php echo e(date('d', strtotime($program->date))); ?></div>
            <small><?php echo e(date('M Y', strtotime($program->date))); ?></small>
        </div>

        <img src="<?php echo e(asset($program->poster)); ?>" alt="Program Poster" class="event-image">

        <div class="event-details">
            <div class="event-title"> <?php echo e($program->title); ?> </div>
            <p> <?php echo e($program->description); ?> </p>
            <hr>
            <div class="event-meta">
                <p><strong>Location:</strong> <?php echo e($program->location); ?></p>
                <p><strong>Time:</strong> <?php echo e($program->time); ?></p>
            </div>

            <div class="action-buttons">
            <a href="<?php echo e(route('programs.edit', $program->id)); ?>" class="btn-edit">Edit</a>

            <a href="<?php echo e(route('admin.complete', $program->id)); ?>" 
            class="btn-completed"
            onclick="return confirm('Mark this program as completed?')">
            Completed
            </a>

            <?php if($program->report): ?>
                <a href="<?php echo e(asset($program->report)); ?>" target="_blank" class="btn-view">View Report</a>
            <?php endif; ?>

            <?php if($program->poster): ?>
                <a href="<?php echo e(asset($program->poster)); ?>" target="_blank" class="btn-view">View Poster</a>
            <?php endif; ?>

            <form action="<?php echo e(route('programs.toggleRegistration', $program->id)); ?>" method="POST" style="display:inline-block">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button type="submit" class="btn <?php echo e($program->registration_open ? 'btn-danger' : 'btn-success'); ?>">
                    <?php echo e($program->registration_open ? 'Close Registration' : 'Open Registration'); ?>

                </button>
            </form>
        </div>

        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fyp2\UTMConnect+\resources\views/admin/index.blade.php ENDPATH**/ ?>