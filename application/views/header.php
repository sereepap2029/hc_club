<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=site_url()?>favicon.ico">

    <title>HC Club</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=site_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=site_url()?>jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
    <link href="<?echo site_url();?>css/jquery.datetimepicker.css" rel="stylesheet" />
    <link href="<?=site_url()?>css/jquery.fancybox.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=site_url()?>/css/jquery.fileupload.css">
    <!-- Custom styles for this template -->
    <link href="<?=site_url()?>css/styles.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?=site_url()?>js/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="<?echo site_url();?>js/jquery.datetimepicker.js"></script>
    <script src="<?=site_url()?>jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="<?=site_url()?>js/jquery.fancybox.js"></script>

    
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">HC Club</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?=site_url("main/dashboard")?>">Home</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?=site_url("member")?>">สมาชิก</a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ผู้ดูแลระบบ</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?=site_url("admin_user/create")?>">Add</a>
              <a class="dropdown-item" href="<?=site_url("admin_user")?>">Admin list</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="<?=site_url("main/logout")?>">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>