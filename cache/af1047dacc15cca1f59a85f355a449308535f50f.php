<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">A PHP 7.0 lightweight and fast framework</h1>
            <p class="lead">Powered with Eloquent ORM, Laravel Validation Library and Blade Template Engine</p>
            <ul class="list-unstyled">
                <li>Eloquent 5.5</li>
                <li>Illuminate/Validation 5.5</li>
                <li>Blade Template Engine</li>
            </ul>
        </div>
    </div>
</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>