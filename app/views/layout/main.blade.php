<!DOCTYPE html>
<html>
<head>
    <title>Loopsoft-techcorp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link href="{{ URL::asset('asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('asset/font-awesome2/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('asset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<?=HTML::script('asset/js/jquery.tablesorter.min.js')?>
<?=HTML::script('asset/js/jquery-latest.js')?>
<script>
$(document).ready(function() 
    { 
        $("#table").tablesorter(); 
    } 
); 

</script>
</head>
    <body>
        @include('layout.navigation')
    <div class="wrapper">
      @yield('content')
  </div>

       @if(Request::path() != '/')
      @include('layout.footer')
       @endif
        <?=HTML::script('asset/jquery/jquery-1.11.1.min.js')?>
        <?=HTML::script('asset/bootstrap/js/bootstrap.min.js')?>
        <script>

            $(function() {

                $('img').on('dragstart', function(event) { event.preventDefault(); });
            });

        </script>


    </body>
</html>