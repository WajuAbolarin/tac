<?php $submission = app('App\Submission'); ?>

<?php $__env->startSection('title', 'The Apostolic Church Nigeria Abuja Metropolis Easter Youth Convocation'); ?>
<?php $__env->startPush('header-scripts'); ?>
<style>
.space{
    padding: 0 10px;
}
.space-up{
    padding-top: 20px;
}
</style>
<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
<link rel="stylesheet" href="<?php echo e(mix('css/seed.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="container">
        <div class="entry-content pt-2 mt-3 px-auto d-flex justify-content-center">
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfjapMhSe2DmZ0cUCfkTJTE-fMb6YHwMbjXBmqMJC_APnzVOg/viewform?embedded=true" width="700" height="1024" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
        </div>
        <!-- entry-content -->
    </div>
    <!-- container -->
</div>
<!-- main-content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-scripts'); ?>
<script src="<?php echo e(mix('js/submission.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>