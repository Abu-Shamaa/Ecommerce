<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-shop</title>

    <!-- Styles -->
    <link href="{{ asset('admin/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

   
</head>
<body>
    @include('layouts.inc.sidebar')
    

    @include('layouts.inc.adminnav')
    <div class="content-wrap">
        <div class="main">
    <div class="content">
        @yield('content')
    </div>
    <div>
    @include('layouts.inc.adminfooter')  
    </div>
    
      
</div> 
        </div>  

    <!-- jquery vendor -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nanoscroller.min.js') }}"></script>

    <!-- sidebar -->
    <script src="{{ asset('admin/js/sidebar.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>
        swal("{{session('status')}}");
        
    </script>
    @endif
    @yield('scripts')
</body>
</html>
