@extends('frontend.layouts.master')

@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-4">{{ $category->name }}</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <a href="{{ route('product-details', $product->id) }}">
                            @php
                                $images = json_decode($product->image, true);
                                $firstImage = $images ? $images[0] : 'default_image.jpg';
                            @endphp
                            <img style="height: 300px; object-fit: cover;" src="{{ asset($firstImage) }}"
                                 class="card-img-top" alt="{{ $product->title }}">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('product-details', $product->id) }}" class="text-decoration-none">
                                <h5 class="card-title">{{ $product->title }}</h5>
                            </a>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-muted"><span class="text-primary">{{ $product->price }}</span> سعر المنتج
                                </p>
                                <p class="text-muted">باقي بالمخزون <span
                                            class="text-primary">{{ $product->product }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- إضافة روابط الترقيم -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
