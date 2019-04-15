
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin View">
    <meta name="author" content="Abolarin Olanrewaju Olabode">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>ADMIN</title>

    <meta name="description" content="Register for The Apostolic Church Abuja Metropolis, Nyanya Area, Gwagwalada Area, Suleja Area Annual Easter Youth Convocation, God First themed The Unique Youth">

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(mix('css/admin.css')); ?>">
</head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">TAC YOUTHS</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid" id="app">
 <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column px-3 mt-5">
          <router-link tag="li" to="/" class="nav-item my-2">
              Attendees
          </router-link>
        <router-link tag="li" to="/seed" class="nav-item my-2">
              Seed Fund
          </router-link>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <router-view></router-view>
    </main>
  </div>
</div>
    <script src="<?php echo e(mix('js/manifest.js')); ?>"></script>
    <script src="<?php echo e(mix('js/vendor.js')); ?>"></script>
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
 </body>
</html>
