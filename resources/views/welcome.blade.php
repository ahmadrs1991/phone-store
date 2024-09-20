<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '  Phone Store')</title>
    <!-- ربط CSS أو Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
        .navbar {
            background-color: #007bff; /* لون خلفية الرأس */
        }
        .navbar-brand, .nav-link {
            color: #fff !important; /* جعل النص في الرأس أبيض */
        }
        .nav-link:hover {
            color: #f8f9fa !important; /* تغير لون الرابط عند المرور عليه */
        }
        .footer {
            background-color: #343a40;
            color: #fff;
        }
        .footer p {
            margin: 0;
        }
        .footer a {
            color: #f8f9fa;
            text-decoration: none;
        }
        .footer a:hover {
            color: #d3d3d3;
        }

      .container1 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr  ; /* 3 equal rows */
            height: 15vh; /* Full viewport height */
        }

        .section {
            display: flex;
            align-items: center; /* Center content vertically */
            justify-content: center; /* Center content horizontally */
            border: 1px solid black; /* Border for visibility */
        }

        /* Optional: Different background colors */
        .section:nth-child(1) { background-color: lightblue; }
        .section:nth-child(2) { background-color: lightgreen; }
        .section:nth-child(3) { background-color: lightcoral; }
    </style>

</head>
<body>

    <!-- الرأس -->
   <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">


          <a class="nav-link active" aria-current="page" href="#"> دليل شراء الهاتف </a>
           <a class="nav-link" href="{{ route('accessories.index') }}">قسم الاكسسوارات</a>
           <a class="navbar-brand" href="/" style="t" > Phone Store</a>
           <a class="nav-link " href="{{ route('categories.index') }}" >قسم الاجهزة</a>
            <a class="nav-link " href="{{ route('mobiles.index') }}"   >      قسم الصيانة</a>

        </div>
    </nav>

    <!-- المحتوى -->
     @include('partials.header')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <p>{{ $error }}</p>
        </div>
    @endif
    <div class="container mt-4">
        @yield('content')
    </div>

   {{-- <div class="container">
        <div class="row">
            @foreach($lasttwo1 as $accsessory)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm" style="border-radius: 25px; overflow: hidden; transition: transform 0.2s ease;">
                        @if($accsessory->image)
                            <img src="{{ asset('images/accessories/' . $accsessory->image) }}" class="card-img-top" alt="{{ $accsessory->name }}" style="height: 100px; width: 40%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/250" class="card-img-top" alt="لا توجد صورة" style="height: 100px; width: 40%; object-fit: cover;">
                        @endif
                        <div class="card-body text-center">
                        <A     <h5 class="card-title font-weight-bold">{{ $accsessory->name }}</h5>
                            <p class="card-text text-muted">السعر: <span class="text-primary"> $ {{ $accsessory->price }} </span></p>
                            <p class="card-text text-muted"><span class="text-primary">{{ $accsessory->brand }}</span>:  Model</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
  </div> --}}
    <!-- الفوتر -->
    <footer class="footer py-10 mt-6">
        <div class="container text-center">
            <p>©  </p>

        </div>
    </footer>

    <!-- ربط JavaScript أو Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
