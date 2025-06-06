

<?php $__env->startSection('content'); ?>

<head>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>

<div class="navbar">
    <a href="#">PERSAKA CLUB</a>
    <div class="float-end">
    <a href="<?php echo e(route('admin')); ?>" class="me-3">Homepage</a>
    <a href="<?php echo e(route('program.create')); ?>" class="me-3">Add Program</a>
    <a href="#" class="me-3">Latest Program</a>
        <a href="<?php echo e(route('logout')); ?>" class="btn">Logout</a>
    </div>
</div>

<div class="container mt-5">
    <h2>Edit Program</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('programs.update', $program->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
    
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo e($program->title); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" required><?php echo e($program->description); ?></textarea>
        </div>

        <div class="mb-3">
            <label>Date:</label>
            <input type="date" name="date" value="<?php echo e($program->date); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Location:</label>
            <input type="text" name="location" value="<?php echo e($program->location); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Time:</label>
            <input type="text" name="time" value="<?php echo e($program->time); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Poster (Image):</label>
            <input type="file" name="poster" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Report (PDF or DOC):</label>
            <input type="file" name="report" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <input type="submit" value="Update" class="btn btn-primary">
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fyp2\UTMConnect+\resources\views/programs/edit.blade.php ENDPATH**/ ?>