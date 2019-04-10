<?php $__env->startSection('title', 'The Apostolic Church Nigeria Abuja Metropolis Easter Youth Convocation'); ?>
<?php $__env->startPush('header-scripts'); ?>
<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
<script src="https://js.paystack.co/v1/inline.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(asset('css/select2-bootstrap4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<div class="hero-content">
    <div class="container hero-container">
        <div class="row">
            <div class="col-12 offset-lg-2 col-lg-10">
                <div class="entry-header">
                    <h2>The Unique Youth</h2>
                </div>
                <!-- .entry-header -->
            </div>
            <!-- .col-12 -->
        </div>
        <!-- row -->

    </div>
    <!-- .container -->
    <img class="header-background" src="https://res.cloudinary.com/jabilegbe/image/upload/w_auto,c_scale,g_auto,q_auto/v1551887570/tac/cover_vmba0m.png" alt="">

</div>
<!-- .page-header -->

<div class="main-content">
    <div class="container">
        <div class="entry-header py-3 my-2">
            <div class="entry-title text-center">
                <p>TAC Abuja Metropolitan Youth Convention</p>
                <h2>Registration</h2>
            </div>
            <!-- -->
        </div>
        <!-- -->
        <div class="entry-content pt-3 mt-4">
            <div class="row">
                <div class="col-xs-12 col-md-6 mx-auto">
                    <div class="alert alert-info d-none border-0 shadow-sm notification" id="notification" role="alert">
                    </div>
                </div>

                <div class="col-xs-12 col-md-8 mx-auto">
                    <form id="register-form" action="/register" method="POST" novalidate id="register-form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-xs-12 col-md-6 mb-3 form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Surname Firstname" equired>
                            </div>
                            <div class="col-xs-12 col-md-6 mb-3 form-group">
                                <label for="email">Email Address</label>
                                <input name="email" type="email" class="form-control" placeholder="you@domain.com" equired>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6 mb-3 form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" maxlength="11" minlength="11" placeholder="08000000000" equired>
                            </div>
                            <div class="col-xs-12 col-md-6 mb-3 form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="XY, XYZ Street, XYZ" equired>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6 mb-3 form-group">
                                <label for="phone">Assembly</label>
                                <select class="custom-select" name="assembly_id" id="assemblyInput" style="height:36px">
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-6 mb-3 form-group d-flex justify-content-between align-items-baseline px-2" style="padding-top:38px;">
                                <span class="form-text">Gender</span>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" type="radio" id="customRadioInline1" class="custom-control-input" value="male">
                                    <label class="custom-control-label" for="customRadioInline1">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" type="radio" id="customRadioInline2" class="custom-control-input" value="female">
                                    <label class="custom-control-label" for="customRadioInline2">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-xs-12 col-md-12 mb-3 form-group d-flex justify-content-between align-items-baseline px-2">
                                <span class="form-text">Age Range</span>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="age1" name="age" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="age1">12-20 years</label>
                                </div>

                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="age2" name="age" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="age2">21-30 years</label>
                                </div>

                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="age3" name="age" class="custom-control-input" value="3">
                                    <label class="custom-control-label" for="age3">Over 30 years</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-xs-12 col-md-6 ml-md-auto mb-md-5">
                                <button class="btn btn-block" role="button" id="payBtn">PAY DUES & SUBMIT</button>
                                <img src="<?php echo e(asset('/images/secured_by_paystack.png')); ?>" class="mt-3 d-block mx-auto w-100" width="320px">
                            </div>
                            <!-- <div class="col-xs-12 col-md-6 mt-2 mt-md-0">
                                <button class="btn btn-block" id="submitBtn">
                                    <span class="loading"></span>
                                    Submit
                                </button>
                            </div> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="<?php echo e(mix('js/register.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>