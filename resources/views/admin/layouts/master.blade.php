<!DOCTYPE html>
<html lang="en">
@include("admin.layouts.main-head")

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('admin.layouts.Navbar')
        @include("admin.layouts.main-sidebar")
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        @include('admin.layouts.main-footer')
    </div>
</div>
@include('sweetalert::alert')

@include('admin.layouts.scripts')
</body>
</html>
