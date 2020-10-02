<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Control Panel </title>

    <!-- Core CSS - Include with every page -->
    <link href =  "{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href= "{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{ asset('assets/css/sb-admin.css') }}" rel="stylesheet">
  </head>
  <body>

    <div id="app"></div>

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Core Scripts - Include with every page -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{ asset('assets/js/sb-admin.js') }}"></script>

  </body>
</html>
