<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">




    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>


    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    {{-- font awesome untuk icon--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- DataTable --}}
    <link rel="stylesheet" href="{{asset('snippets/dataTable/dataTable.css')}}">

    @yield('style_css')

</head>

<body>

    @include('komponen.navbar')

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>



        <h3> @yield('title_page') </h3>

        @yield('content')


    <script src="{{asset('snippets/jquery/jquery.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    <script src="{{asset('snippets/dataTable/dataTable.js')}}" charset="utf-8"></script>
    <script src="{{asset('snippets/jQueryprint/jQuery.print.js')}}" charset="utf-8"></script>
    <script src="{{asset('snippets/js/dataTable.js')}}" charset="utf-8"></script>
    <script src="{{asset('snippets/js/kategori.js')}}" charset="utf-8"></script>
    <script src="{{asset('snippets/js/produk.js')}}" charset="utf-8"></script>
    <script src="{{asset('snippets/js/penjualan.js')}}" charset="utf-8"></script>

</body>

</html>
