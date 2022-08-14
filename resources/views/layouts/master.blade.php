<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=url('assets/css/bootstrap.min.css');?>" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?=url('assets/css/shards-dashboards.1.1.0.min.css');?>">
    <link rel="stylesheet" href="<?=url('assets/css/jquery.dataTables.css');?>">
    <link rel="stylesheet" href="<?=url('assets/css/extras.1.1.0.min.css');?>">
    <link rel="stylesheet" href="<?=url('assets/css/custom.css');?>">
     @stack('css')
      <style>
          .required-field::after {
              color: red;
              content: ' *';
          }
          .error-msg {
              color: red;
          }
      </style>
    <script async defer src="<?=url('assets/js/button.js');?>"></script>
    <script src="https://kit.fontawesome.com/3e02166005.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/3s5zichtnc9cbw8hof2l7f5kwucwo3layiep7ndnddmwnii7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        @include('layouts.sidebar')
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            @include('layouts.navbar')
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
              @yield('content')
          </div>

          @include('layouts.footer')
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="<?=url('assets/js/popper.min.js');?>" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?=url('assets/js/bootstrap.min.js');?>" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?=url('assets/js/Chart.min.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="<?=url('assets/js/shards.min.js');?>"></script>
    <script src="<?=url('assets/js/extras.1.1.0.min.js');?>"></script>
    <script src="<?=url('assets/js/extras.1.1.0.min.js');?>"></script>
    <script src="<?=url('assets/js/shards-dashboards.1.1.0.min.js');?>"></script>
    <script src="<?=url('assets/js/app/app-blog-overview.1.1.0.js');?>"></script>
    <script src="<?=url('assets/js/jquery.dataTables.js');?>"></script>
    <script async defer src="<?=url('assets/js/jquery.repeater.js');?>"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
    <script>
      tinymce.init({
        selector: '.textarea',
        plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
      });
    </script>
     @stack('js')
  </body>
</html>
