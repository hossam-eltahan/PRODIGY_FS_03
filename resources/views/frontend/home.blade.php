@php
    $products = \App\Models\Product::paginate(8);
@endphp
@extends('frontend.layouts.master')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center my-4">اهم المنتجات</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm rounded">
                        <a class="text-decoration-none" href="{{ route('product-details', $product->id) }}">
                            @php
                                $imgPaths = json_decode($product->image, true);
                                $firstImage = $imgPaths ? asset($imgPaths[0]) : 'default-image-path.jpg'; // ضع المسار للصورة الافتراضية هنا
                            @endphp
                            <img class="card-img-top" src="{{ $firstImage }}" alt="{{ $product->title }}"
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><span
                                        style="font-size: 18px;">اسم المنتج: {{$product->title}}</span></h5>
                                <h6 class="card-subtitle text-muted">سعر المنتج: {{$product->price}}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex ">
            {{ $products->links() }}
        </div>
    </div>
@endsection
