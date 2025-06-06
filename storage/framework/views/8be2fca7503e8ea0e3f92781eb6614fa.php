

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
    <h2 class="mb-4">Participant List</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="<?php echo e($search); ?>" class="form-control" placeholder="Search by name or program title">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Matric Number</th>
                <th>Program</th>
                <th>Course & Year</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Status</th>
                <th>Rejection Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($participant->user->name ?? 'N/A'); ?></td>
                    <td><?php echo e($participant->user->password ?? 'N/A'); ?></td>
                    <td><?php echo e($participant->program->title ?? 'N/A'); ?></td>
                    <td><?php echo e($participant->course_year); ?></td>
                    <td><?php echo e($participant->phone_number); ?></td>
                    <td><?php echo e($participant->desired_position); ?></td>
                    <td>
                        <?php if($participant->status == 'accepted'): ?>
                            <span class="badge bg-success">Accepted</span>
                        <?php elseif($participant->status == 'rejected'): ?>
                            <span class="badge bg-danger">Rejected</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($participant->status == 'rejected'): ?>
                            <?php echo e($participant->rejection_reason); ?>

                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="<?php echo e(route('participants.updateStatus', $participant->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="btn btn-success btn-sm">Accept</button>
                        </form>

                        <!-- Reject button triggers modal -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($participant->id); ?>">
                            Reject
                        </button>

                        <!-- Rejection Modal -->
                        <div class="modal fade" id="rejectModal<?php echo e($participant->id); ?>" tabindex="-1" aria-labelledby="rejectModalLabel<?php echo e($participant->id); ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="<?php echo e(route('participants.updateStatus', $participant->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="status" value="rejected">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectModalLabel<?php echo e($participant->id); ?>">Reject Reason</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="rejection_reason" class="form-label">Reason for rejection:</label>
                                                <textarea name="rejection_reason" class="form-control" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Submit Rejection</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="9" class="text-center">No participants found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fyp2\UTMConnect+\resources\views/admin/participants.blade.php ENDPATH**/ ?>