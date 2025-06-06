

<?php $__env->startSection('content'); ?>
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(asset('images/plogo.png')); ?>" class="navbar-brand-image img-fluid" alt="PERSAKA Club">
                        <span class="navbar-brand-text">
                            PERSAKA
                            <small>Club</small>
                        </span>
                    </a>
        
                    <div class="d-lg-none ms-auto me-3">
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Login</a>
                    </div>
        
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item require-login" href="<?php echo e(route('latest.index')); ?>">Latest Events</a></li>
                                </ul>
                            </li>
                        </ul>
        
                        <div class="d-none d-lg-block ms-lg-3">
                            <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Login</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column">
                    <form class="custom-form login-form" action="<?php echo e(route('login')); ?>" method="POST" role="form">
                        <?php echo csrf_field(); ?>
                        <div class="login-form-body">
                            <div class="mb-4">
                                <label class="form-label mb-2" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label mb-2" for="password">Password</label>
                                <input type="password" name="password" id="password" pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="Matric Num" required>
                            </div>
                            <div class="col-lg-5 col-md-7 col-8 mx-auto">
                                <button type="submit" class="form-control">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                </svg>
            </div>
        
            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="section-overlay"></div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>

        
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <h2 class="text-white">Welcome to the club</h2>
                            <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                                <span>PERSAKA is</span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Modern</b>
                                    <b>Creative</b>
                                    <b>Lifestyle</b>
                                </span>
                            </h1>
                            <div class="custom-btn-group">
                                <a href="#section_2" class="btn custom-btn smoothscroll me-3">Our Story</a>
                            </div>
                        </div>
        
                         <div class="col-lg-6 col-12">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Futmpersaka%2Fvideos%2F1027213597889051%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>                            </div>
                        </div> -
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>

            </section>
        
            <section class="about-section section-padding" id="section_2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-lg-5 mb-4">About PERSAKA</h2>
                        </div>
                        <div class="col-lg-5 col-12 me-auto mb-4 mb-lg-0">
                            <h3 class="mb-3">What is PERSAKA Club</h3>
                            <p><strong>UTM PERSAKA</strong> stands for Persatuan Mahasiswa Sains Komputer (Computer Science Students' Association) of Universiti Teknologi Malaysia (UTM), a student organization at the university focused on computer science. </p>
                            <p>PERSAKA organizes various activities, including the Annual General Meeting (AGM), workshops, and hackathons. </p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                            <div class="member-block">
                                <div class="member-block-image-wrap">
                                    <img src="<?php echo e(asset('images/agm.png')); ?>" class="member-block-image img-fluid" alt="">
                                </div>
                                <div class="member-block-info d-flex align-items-center">
                                    <h4>Annual General Meeting 2023 (AGM’23)</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="member-block">
                                <div class="member-block-image-wrap">
                                    <img src="<?php echo e(asset('images/hack.png')); ?>" class="member-block-image img-fluid" alt="">
                                </div>
                                <div class="member-block-info d-flex align-items-center">
                                    <h4>UTMxHACKATHON 2024: UTM Students Excel in Innovation Pitch</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 me-auto">
                        <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(asset('images/plogo.png')); ?>" class="navbar-brand-image img-fluid" alt="">
                            <span class="navbar-brand-text">PERSAKA <small>Club</small></span>
                        </a>
                    </div>

                    <div class="col-lg-2 col-12 ms-auto">
                        <ul class="social-icon mt-lg-5 mt-3 mb-4">
                            <li class="social-icon-item"><a href="https://www.instagram.com/persakautm?igsh=MXF0NTBkbnpicmtzcQ==" class="social-icon-link bi-instagram"></a></li>
                            <li class="social-icon-item"><a href="https://www.facebook.com/utmpersaka" class="social-icon-link bi-facebook"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#81B29A" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>

        </footer>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const links = document.querySelectorAll(".require-login");

        links.forEach(link => {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                alert("Please Login First");
            });
        });
    });
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fyp2\UTMConnect+\resources\views/home.blade.php ENDPATH**/ ?>