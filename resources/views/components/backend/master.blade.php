<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/backend/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/exzoom/jquery.exzoom.css')}}" rel="stylesheet">


</head>

<body>
    <!-- navbar -->
    <x-backend.partials.navbar />
    <!-- navbar -->
    <div class="container-fluid">
        <div class="row">

            <x-backend.partials.sidebar />

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary" title="Go back to previous page"><i class=" fa-solid fa-rotate-left fs-5"></i></a>
                {{$slot}}
            </main>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/exzoom/jquery.exzoom.js')}}"></script>
    <script src="{{asset('assets/js/backend/scripts.js')}}"></script>

    @stack('scripts')
</body>

</html>