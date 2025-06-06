

<?php $__env->startSection('content'); ?>

<head>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
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
    <h2>Add New Program</h2>
    <form method="POST" action="<?php echo e(route('program.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Time:</label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Poster (Image):</label>
            <input type="file" name="poster" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Report (PDF or DOC):</label>
            <input type="file" name="report" class="form-control" accept=".pdf,.doc,.docx" required>
        </div>
        <button type="submit" class="btn btn-success">Add Program</button>
    </form>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fyp2\UTMConnect+\resources\views/admin/add_program.blade.php ENDPATH**/ ?>