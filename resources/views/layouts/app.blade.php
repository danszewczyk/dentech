<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Material Design fonts -->
     <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
     <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

     <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

     <!-- Bootstrap Material Design -->
     <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap-material-design.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/ripples.min.css') }}">

     


        <!-- Twitter Bootstrap -->


        
        
        
         

     
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

        

    </script>

    <script type="text/javascript">
        if(("standalone" in window.navigator) && window.navigator.standalone){
            var noddy, remotes = false;
            document.addEventListener('click', function(event) {
            noddy = event.target;
            while(noddy.nodeName !== "A" && noddy.nodeName !== "HTML") {
                noddy = noddy.parentNode;
            }
            if('href' in noddy && noddy.href.indexOf('http') !== -1 && (noddy.href.indexOf(document.location.host) !== -1 || remotes))
            {
                event.preventDefault();
                document.location.href = noddy.href;
            }
            },false);
        }
    </script>

</head>
<body>
    <div id="app">
        @yield('content')
    </div>

        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script src="{{ asset('dist/js/ripples.js') }}"></script>
         <script src="{{ asset('dist/js/material.js') }}"></script>

             <script>
           $.material.init();
         </script>


</body>
</html>
