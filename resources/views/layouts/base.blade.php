<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Penilaian Sikap Siswa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="smooets">


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset ('images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset ('images/icons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset ('images/icons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset ('images/icons/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset ('images/icons/safari-pinned-tab.svg') }}" color="#709f25">
    <link rel="shortcut icon" href="{{ asset ('images/icons/favicon.ico') }}">
    <meta name="msapplication-config" content="{{ asset ('images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">


    <link rel="canonical" href="http://www.smooets.com/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



    <!-- web styles -->
    <link href="{{ asset ('styles/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset ('styles/bootstrap3-wysihtml5.css') }}" rel="stylesheet">
    <link href="{{ asset ('styles/main.css') }}" rel="stylesheet">
    <link href="{{ asset ('styles/mobile.css') }}" rel="stylesheet">
    <link href="{{ asset ('styles/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset ('dist/css/select2.min.css') }}" rel="stylesheet">

    <style type="text/css">
      textarea{
        resize: none;
      }
    .connected, .sortable, .exclude, .handles {
      font-size: 10pt  
    }
    .sortable.grid {
      overflow: hidden;
    }
    .connected li, .sortable li, .exclude li, .handles li {
      font-size: 10pt
    }
    .handles span {
      cursor: move;
    }
    li.disabled {
      opacity: 0.5;
    }
    .sortable.grid li {
      line-height: 80px;
      float: left;
      width: 80px;
      height: 80px;
      text-align: center;
    }
    li.highlight {
      background: #FEE25F;
    }
    #connected {
      width: 440px;
      overflow: hidden;
      margin: auto;
    }
    .connected {
      float: left;
      width: 200px;
    }
    .connected.no2 {
      float: right;
    }
    li.sortable-placeholder {
      border: 1px dashed #CCC;
      background: none;
    }
    </style>
    <!-- <link href="{{ asset('css/app.css')}}" rel="stylesheet"> -->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- [if lt IE 9]>
    <script src="scripts/html5shiv.min.js"></script>
    <script src="scripts/respond.min.js"></script>
    <![endif] -->

  </head>
  <body>
  @yield('content')
</body>
    <script src="{{ asset ('scripts/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset ('scripts/jquery-migrate-3.0.0.min.js')}}"></script>
    <script src="{{ asset ('scripts/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('scripts/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script src="{{ asset ('scripts/main.js')}}"></script>
    <script src="{{ asset ('scripts/bootstrap-filestyle.js')}}"></script>
    <script src="{{ asset ('scripts/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{ asset ('scripts/jquery.js')}}"></script>
    <script src="{{ asset ('scripts/jquery-1.11.3.js')}}"></script>
    <script src="{{ asset ('scripts/jquery.sortable.js')}}"></script>
     <script src="{{asset ('dist/js/select2.full.js') }}" type="text/javascript"></script>
    <script>
      $(function() {
        $('.sortable').sortable();
        $('.handles').sortable({
          handle: 'span'
        });
        $('.connected').sortable({
          connectWith: '.connected'
        });
        $('.exclude').sortable({
          items: ':not(.disabled)'
        });
      });
    </script>
  @yield('scripts')
</html>
