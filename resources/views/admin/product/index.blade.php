@extends('admin.layouts.master')
@section('title')
    Products Page
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products Setting</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Products</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>اسم المنتج</th>
                                <th>صورة المنتج</th>
                                <th>فئة المنتج</th>
                                <th>وصف المنتج</th>
                                <th>السعر</th>
                                <th>البيانات الإضافية للسعر</th>
                                <th>المتبقي بالمخزون</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td class="d-flex align-items-center justify-content-between">
                                        @php
                                            $imgPaths = json_decode($product->image, true);
                                        @endphp
                                        @if($imgPaths)
                                            @foreach($imgPaths as $imgPath)
                                                <img src="{{ asset($imgPath) }}" alt="{{ $product->title }}" width="70"
                                                     height="50" style="margin: 5px;">
                                            @endforeach
                                        @else
                                            <p>لا يوجد صورة للمنتج</p>
                                        @endif
                                    </td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @if($product->additional_data)
                                            @php
                                                $additionalData = json_decode($product->additional_data, true);
                                            @endphp
                                            @if($additionalData)
                                                <ul>
                                                    @foreach($additionalData as $data)
                                                        <li>{{ $data }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>No additional data</p>
                                            @endif
                                        @else
                                            <p>No additional data</p>
                                        @endif
                                    </td>
                                    <td>{{ $product->product }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action buttons">
                                            <a class="btn btn-primary"
                                               href="{{ route('admin.product.edit', $product->id) }}">
                                                <i class="fas fa-edit" style="font-size:15px"></i>
                                            </a>
                                            <a class="btn btn-danger delete-item"
                                               href="{{ route('admin.product.destroy', $product->id) }}">
                                                <i class="fas fa-trash" style="font-size:15px"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
