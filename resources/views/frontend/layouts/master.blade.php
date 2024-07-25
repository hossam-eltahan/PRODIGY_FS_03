<!DOCTYPE html>
<html lang="ar">

@include('frontend.layouts.main-head')
@section('title')
    HomePage
@endsection

<body>
    <!-- Navbar -->
    @include('frontend.layouts.navbar')
    <!-- Navbar -->
    @yield('content')

    @include('frontend.layouts.main-scripts')

</body>

</html>
