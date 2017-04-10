<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

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

	<title>Staff - dentech.io</title>
</head>
<body>
    
    @include('layouts.partials.navigation')

	<div class="container">
        @include('layouts.partials.alerts')
        @yield('content')
    </div>
</body>
</html>
