

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
                    <a class="nav-link" href="dashboard#section_4">Events</a>
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

    <svg viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#3D405B" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z" stroke-width="0"></path> <path fill="#3D405B" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z" stroke-width="0"></path> <path fill="#3D405B" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z" stroke-width="0"></path><path fill="#3D405B" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z" stroke-width="0"></path><path fill="#3D405B" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z" stroke-width="0"></path><path fill="#3D405B" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z" stroke-width="0"></path><path fill="#3D405B" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z" stroke-width="0"></path></svg>

    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">

                <h1 class="text-white mb-4 pb-2">Latest Event.</h1>

            </div>

        </div>
    </div>

    <svg viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#ffffff" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z" stroke-width="0"></path> <path fill="#ffffff" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z" stroke-width="0"></path> <path fill="#ffffff" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z" stroke-width="0"></path><path fill="#ffffff" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z" stroke-width="0"></path><path fill="#ffffff" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z" stroke-width="0"></path><path fill="#ffffff" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z" stroke-width="0"></path><path fill="#ffffff" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z" stroke-width="0"></path></svg>
</section>

 <div class="container mt-5">
    <h2 class="section-title">Latest Events</h2>
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
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fyp2\UTMConnect+\resources\views/latest/index.blade.php ENDPATH**/ ?>