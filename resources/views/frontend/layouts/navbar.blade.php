{{--<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">--}}
{{--    <div class="container-fluid text-center">--}}
{{--        <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--            <img style="width: 50px; height: 50px;" src="{{ asset('frontend/assets/images/logo.png') }}" alt="">--}}
{{--        </a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"--}}
{{--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">الرئيسية</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"--}}
{{--                       aria-expanded="false">--}}
{{--                        الاقسام--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        @foreach ($categories as $category)--}}
{{--                            <li><a class="dropdown-item"--}}
{{--                                   href="{{ route('category.products', $category->id) }}">{{ $category->name }}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#contact">اطلب الان</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

@php
    $categories = \App\Models\Category::all();
@endphp

<div class="navbar">
    <div class="container px-3">
        <i class="fas fa-bars menu-icon" onclick="toggleMenu()"></i>
        <a href="{{ url('/') }}" class="logo text-decoration-none text-black">
            <span>MATAJER</span>
        </a>
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="بحث..."/>
        </div>
    </div>
    <div id="mySidebar" class="sidebar text-center">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleMenu()">&times;</a>
        <a href="{{ url('/') }}">الرئيسية</a>
        <div class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" onclick="toggleDropdown()">الاقسام</a>
            <div class="dropdown-menu" id="dropdownMenu">
                @foreach($categories as $category)
                    <a class="dropdown-item" style="font-size: 16px;"
                       href="{{ route('category.products', $category->id) }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <a href="#contact">اتصل بنا</a>
    </div>
</div>
