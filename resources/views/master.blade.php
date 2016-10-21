<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>My Hot Biscuit App</title>
        <link rel="stylesheet" href="{!! load_asset('asset/styles/bootstrap/bootstrap.css') !!}" type="text/css">
        <link rel="stylesheet" href="{!! load_asset('asset/styles/style.css') !!}" type="text/css">
        <link rel="stylesheet" href="{!! load_asset('asset/styles/responsify.css') !!}" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Grand+Hotel|Petit+Formal+Script|Raleway" rel="stylesheet">
        <script type="text/javascript" src="{!! load_asset('asset/scripts/bootstrap.min.js') !!}"></script>   
        <script type="text/javascript" src="{!! load_asset('asset/scripts/index.js') !!}"></script>
    </head>

    <body>
        
        @yield('content')
        
        <!-- <footer class="footer">
          
        </footer>
         -->
    </body>
    <script type="text/javascript" src="{!! load_asset('asset/scripts/jquery/jquery.js') !!}"></script>
</html>