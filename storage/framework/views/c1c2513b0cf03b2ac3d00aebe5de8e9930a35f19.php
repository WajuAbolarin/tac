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
        <div class="entry-header py-3 my-2">
            <div class="entry-title text-center">
                <h4 style="color:black">TACN Metro Youth Seed Funding Challenge</h4>
                <p class="space-up">
                <span class="space">• Agriculture/Food</span>
                <span class="space">• Fashion Design/Decoration</span>
                <span class="space">• IT/Tech</span>
                </p>
            </div>            <!-- -->
        </div>
        <!-- -->
            <div class="entry-content pt-3 mt-4">
            <div class="row">
                <div class="col-xs-12 col-md-6 mx-auto">
                    <div class="alert alert-info d-none border-0 shadow-sm notification" id="notification" role="alert">
                    </div>
                </div>
                <?php if(session('message')): ?>
                <div class="col-xs-12 col-md-8 mx-auto">
                    <div class="alert alert-success d-flex justify-content-between">
                        <p><?php echo e(session('message')); ?></p> <span class="d-inline-block ml-auto mt-auto h4"> &check; </span>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-xs-12 col-md-8 mx-auto">
                    <form id="register-form" action="seed" method="POST" novalidate id="seed-form">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <?php $__currentLoopData = $submission::Questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xs-12 col-lg-12 form-group">
                                <label for="<?php echo e($question['index']); ?>"><?php echo e($question['question']); ?> </label>
                                <br>
                                <textarea name="<?php echo e($question['index']); ?>" class="form-control" maxlength="<?php echo e($question['chars']); ?>"><?php echo e(old($question['index'])); ?></textarea>
                            <span class="count text-success"></span>
                        </div>
                        <?php if($errors->has($question['index'])): ?>
                            <div class="mx-auto alert alert-danger" role="alert">
                                please answer this questions, with a max of <?php echo e($question['chars']); ?> characters
                            </div>
                        <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xs-12 col-md-6 ml-md-auto mb-md-5">
                                <button type="submit" class="btn btn-block" role="submit"> SUBMIT &rarr;</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- row -->
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