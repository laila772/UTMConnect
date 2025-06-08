

<?php $__env->startSection('content'); ?>

<head>
    <link rel="stylesheet" href="<?php echo e(asset('css/latest.css')); ?>">
</head>

<main>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center">
            <img src="<?php echo e(asset('images/plogo.png')); ?>" class="navbar-brand-image img-fluid" alt="PERSAKA Club">
            <span class="navbar-brand-text">
                PERSAKA
                <small>Club</small>
            </span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard#section_4">Events</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo e(route('latest.index')); ?>">Latest Events</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('participation.status')); ?>">My Status</a></li>
                    </ul>
                </li>
            </ul>

            <div class="d-none d-lg-block ms-lg-3">
                <a class="btn custom-btn custom-border-btn" href="<?php echo e(route('logout')); ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>

<section class="hero-section hero-50 d-flex justify-content-center align-items-center" id="section_1">
    <div class="section-overlay"></div>

    <!-- Decorative SVGs omitted for brevity -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <h1 class="text-white mb-4 pb-2">Participation Form.</h1>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5">
    <h2 class="section-title">Participation Form</h2>
    <h2>Participate in: <?php echo e($program->title); ?></h2>

    <form action="<?php echo e(route('participate.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="program_id" value="<?php echo e($program->id); ?>">

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>" readonly>
        </div>

        <div class="mb-3">
            <label>Matric Number:</label>
            <input type="text" name="matric_number" class="form-control" value="<?php echo e(Auth::user()->password); ?>" readonly>
        </div>

        <div class="mb-3">
            <label>Course/Year:</label>
            <input type="text" name="course_year" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Phone Number:</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Desired Position:</label>
            <select name="desired_position" class="form-control" required>
                <option value="">-- Select --</option>
                <option value="Crew">Crew</option>
                <option value="Participants">Participants</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Confirm</button>
    </form>
</div>

</main>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 me-auto">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="<?php echo e(asset('images/plogo.png')); ?>" class="navbar-brand-image img-fluid" alt="">
                    <span class="navbar-brand-text">PERSAKA <small>Club</small></span>
                </a>
            </div>

            <div class="col-lg-2 col-12 ms-auto">
                <ul class="social-icon mt-lg-5 mt-3 mb-4">
                    <li class="social-icon-item"><a href="#" class="social-icon-link bi-instagram"></a></li>
                    <li class="social-icon-item"><a href="#" class="social-icon-link bi-facebook"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#81B29A" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>

</footer>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cuba\UTMConnect\resources\views/participate/create.blade.php ENDPATH**/ ?>