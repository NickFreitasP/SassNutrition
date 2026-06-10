<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/resources/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/resources/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/resources/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/resources/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/resources/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/resources/assets/modules/summernote/summernote-bs4.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/resources/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/resources/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
   <style>

  body {
	background-color: #f7f8fb;
	font-size: 14px;
	font-weight: 400;
    font-family: "Work Sans", sans-serif;	color: #6c757d;

}
.navbar .form-inline .btn,.navbar .form-inline .btn:hover {
	border-radius: 0 3px 3px 0;
	background-color: #62cdc0;
	padding: 9px 15px 9px 15px;
	border-color: transparent;
}
.fa-bars::before {
	color: #62cdc0
}

.fa-search::before {
	content: "\f002";
    color: white;
}
 .main-sidebar .sidebar-menu li a span,.main-sidebar .sidebar-menu li a i {

     color: white;
     font-weight:bold;
    }
   .main-sidebar .sidebar-menu li a.has-dropdown::after {
	content: "";
	font-family: 'Font Awesome 5 Free';
	font-weight: 900;
	position: absolute;
	top: 50%;
	right: 20px;
	-webkit-transform: translate(0, -50%);
	transform: translate(0, -50%);
	font-size: 12px;
    color: white;
     }
    .card .card-body {
	padding-top: 10px;
	padding-bottom: 10px;
     }
     .main-sidebar .sidebar-menu li a:hover {

      background:#62cdc0

    }
   .main-sidebar .sidebar-menu li ul.dropdown-menu li a {
	color: #868e96;
	height: 35px;
	padding-left: 5px;
	font-weight: 400;
    }
.navbar .nav-link.nav-link-lg i {
	margin-left: 0 !important;
	font-size: 18px;
	line-height: 32px;
    color: #6c757d;
}
.fas, .far, .fab, .fal {
	font-size: 15px;
}

  .page-item.active .page-link  {
	background-color: #62cdc0;
	border-color: #62cdc0;

}
.page-item .page-link {
	color: #62cdc0;
	border-radius: 3px;
	margin: 0 3px;
}
::after, ::before {
	box-sizing: border-box;
    color: white;
}
.fa-trash::before {
	content: "\f1f8";
    color:#cc3333;
}
 .fa-plus::before {
	content: "\f067";
    color: white;
}
 .fa-chart-pie::before ,.fa-save::before{
	/* content: "\f067"; */
    color: white;
}

.main-sidebar .sidebar-menu li a .fa-users::before{
	color: white
}


 .avatar-upload {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      border: 4px solid #62cdc0;
      background: #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s;
    }

    .avatar-upload:hover {
      background: white;
      transform: scale(1.05);
    }
    .fa-eye:before ,.fa-weight-scale:before,.fa-user-circle:before{
        color: black;
    }
     .buttons-diet .fa-eye:before, .buttons-diet .fa-edit:before{
       color: white;
    }
    .fa-phone:before{
        color: #3d3d38
    }
      .fa-envelope:before{
        color: #3d3d38
    }
    .a-link . ,.a-link .fa-edit:before, .a-link .fa-eye:before{
        color: #df4d46;
    }
    .fa-edit:before,.fa-file-pdf:before,.fa-weight-scale:before,.fa-user-edit:before, .fa-chart-line:before,.card-footer .fa-utensils:before{
        /* color: white */
    }
    .td-consultations .fa-eye:before {

    }
    .input-group-textarea-consultation textarea.form-control {
	height: 150px !important;
   }

   .buttons-consultations .fa-edit:before{
       color: white
    }
    .fa-weight:before{
     color: #3b82f6;
    }
    .fa-utensils:before{
       color: #10b981
    }
     .fa-edit:before {
     color:#f59e0b

    }

    .fa-eye:before {
     color:#2563eb

    }
    .fa-notes-medical::before {
	color: #14b8a6
    }
    .buttons-show-user .fa-weight:before {
     color:white

    }

</style>
@stack("style")
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <!-- START NAVBAR --- NICKFREITASP -->
            @include('layouts.admin.navbar')

            <!-- END NAVBAR --- NICKFREITASP -->



            <!-- START SIDEBAR --- NICKFREITASP -->
            @include('layouts.admin.sidebar')
            <!-- END SIDEBAR --- NICKFREITASP -->



            <!-- START MAINCONTENT --- NICKFREITASP -->

            @yield('content')

            <!-- END MAINCONTENT --- NICKFREITASP -->



            <footer class="main-footer">
                <div class="simple-footer text-center">
                    <div>
                        <span style="opacity: 0.5"> Criado por </span> Nicholas Freitas

                    </div>
                    <div>
                        Todos os Direitos Resevados &copy; <?php echo Date('Y');  ?> Orienty

                    </div>
                </div>
            </footer>
        </div>
    </div>

      @stack("script")
    <!-- General JS Scripts -->
    <script src="{{ asset('backend/resources/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('backend/resources/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('backend/resources/assets/js/page/index-0.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('backend/resources/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/resources/assets/js/custom.js') }}"></script>
</body>

</html>
