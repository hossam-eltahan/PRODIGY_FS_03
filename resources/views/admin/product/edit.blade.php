{{--@extends('admin.layouts.master')--}}
{{--@section('title', 'Update Product Page')--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>Update Product Page</h1>--}}
{{--        </div>--}}

{{--        <div class="card card-primary">--}}
{{--            <div class="card-header">--}}
{{--                <h4>Update Product</h4>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <form enctype="multipart/form-data" action="{{ route('admin.product.update', $product->id) }}"--}}
{{--                      method="POST">--}}
{{--                    @method('PUT')--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="title">Name</label>--}}
{{--                        <input name="title" required placeholder="Title" value="{{ $product->title }}" id="title"--}}
{{--                               type="text" class="form-control">--}}
{{--                        @error('title')--}}
{{--                        <p class="text-danger">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="description">Description</label>--}}
{{--                        <input name="description" required placeholder="Description" value="{{ $product->description }}"--}}
{{--                               id="description" type="text" class="form-control">--}}
{{--                        @error('description')--}}
{{--                        <p class="text-danger">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="price">Price</label>--}}
{{--                        <input name="price" required placeholder="Price" value="{{ $product->price }}" id="price"--}}
{{--                               type="text" class="form-control">--}}
{{--                        @error('price')--}}
{{--                        <p class="text-danger">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="product">Stock Quantity</label>--}}
{{--                        <input name="product" required placeholder="Stock Quantity" value="{{ $product->product }}"--}}
{{--                               id="product" type="number" class="form-control">--}}
{{--                        @error('product')--}}
{{--                        <p class="text-danger">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="additional_data">Additional Data</label>--}}
{{--                        @php--}}
{{--                            $additionalData = json_decode($product->additional_data, true) ?? [];--}}
{{--                        @endphp--}}
{{--                        <div id="additional-data-container">--}}
{{--                            @foreach($additionalData as $key => $value)--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="additional_data[{{ $key }}]">Data {{ $key + 1 }}</label>--}}
{{--                                    <input name="additional_data[{{ $key }}]" value="{{ $value }}"--}}
{{--                                           id="additional_data[{{ $key }}]" type="text" class="form-control">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <button type="button" id="add-data-btn" class="btn btn-secondary mt-2">Add More Data</button>--}}
{{--                        @error('additional_data')--}}
{{--                        <p class="text-danger">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="image">Images</label>--}}
{{--                        <div id="image-preview" class="image-preview">--}}
{{--                            @php--}}
{{--                                $imgPaths = json_decode($product->image, true);--}}
{{--                            @endphp--}}
{{--                            @if($imgPaths)--}}
{{--                                @foreach($imgPaths as $imgPath)--}}
{{--                                    <img src="{{ asset($imgPath) }}" alt="Product Image"--}}
{{--                                         style="max-width: 100%; height: auto; margin-bottom: 10px;">--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                <p>No images uploaded</p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <input type="file" name="image[]" id="image-upload" multiple>--}}
{{--                        @error('image')--}}
{{--                        <p class="text-danger">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="category_id">Category</label>--}}
{{--                        <select class="form-control" name="category_id" id="category_id">--}}
{{--                            @foreach ($categories as $category)--}}
{{--                                <option--}}
{{--                                    value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        @error('category_id')--}}
{{--                        <p class="text-danger">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-primary" type="submit">Update</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}

{{--@section('js')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            let additionalDataContainer = $('#additional-data-container');--}}
{{--            let addDataBtn = $('#add-data-btn');--}}
{{--            let additionalDataCount = {{ count($additionalData) }};--}}

{{--            addDataBtn.click(function () {--}}
{{--                additionalDataCount++;--}}
{{--                additionalDataContainer.append(`--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="additional_data[${additionalDataCount}]">Data ${additionalDataCount + 1}</label>--}}
{{--                        <input name="additional_data[${additionalDataCount}]" id="additional_data[${additionalDataCount}]" type="text" class="form-control">--}}
{{--                    </div>--}}
{{--                `);--}}
{{--            });--}}

{{--            $('#image-upload').change(function () {--}}
{{--                var input = $(this)[0];--}}
{{--                if (input.files) {--}}
{{--                    $('#image-preview').empty(); // Clear previous images--}}
{{--                    Array.from(input.files).forEach(file => {--}}
{{--                        var reader = new FileReader();--}}
{{--                        reader.onload = function (e) {--}}
{{--                            $('#image-preview').append('<img src="' + e.target.result + '" style="max-width: 100%; height: auto; margin-bottom: 10px;" />');--}}
{{--                        };--}}
{{--                        reader.readAsDataURL(file);--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}


@extends('admin.layouts.master')
@section('title', 'Update Product Page')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Product Page</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Product</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('admin.product.update', $product->id) }}"
                      method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input name="title" required placeholder="Title" value="{{ $product->title }}" id="title"
                               type="text" class="form-control">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input name="description" required placeholder="Description" value="{{ $product->description }}"
                               id="description" type="text" class="form-control">
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" required placeholder="Price" value="{{ $product->price }}" id="price"
                               type="text" class="form-control">
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Stock Quantity</label>
                        <input name="product" required placeholder="Stock Quantity" value="{{ $product->product }}"
                               id="product" type="number" class="form-control">
                        @error('product')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="additional_data">Additional Data</label>
                        @php
                            $additionalData = json_decode($product->additional_data, true) ?? [];
                        @endphp
                        <div id="additional-data-container">
                            @foreach($additionalData as $key => $value)
                                <div class="form-group">
                                    <label for="additional_data[{{ $key }}]">Data {{ $key + 1 }}</label>
                                    <input name="additional_data[{{ $key }}]" value="{{ $value }}"
                                           id="additional_data[{{ $key }}]" type="text" class="form-control">
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-data-btn" class="btn btn-secondary mt-2">Add More Data</button>
                        @error('additional_data')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Images</label>
                        <div id="image-preview" class="d-flex flex-wrap">
                            @php
                                $imgPaths = json_decode($product->image, true);
                            @endphp
                            @if($imgPaths)
                                @foreach($imgPaths as $index => $imgPath)
                                    <div class="img-container" data-index="{{ $index }}"
                                         style="position: relative; margin: 5px;">
                                        <img src="{{ asset($imgPath) }}" alt="Product Image"
                                             style="width: 50px; height: 50px; object-fit: cover; margin-bottom: 10px;">
                                        <button type="button" class="btn btn-danger btn-sm delete-img-btn"
                                                data-index="{{ $index }}" style="position: absolute; top: 0; right: 0;">
                                            Delete
                                        </button>
                                    </div>
                                @endforeach
                            @else
                                <p>No images uploaded</p>
                            @endif
                        </div>
                        <input type="file" name="image[]" id="image-upload" multiple>
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let additionalDataContainer = $('#additional-data-container');
            let addDataBtn = $('#add-data-btn');
            let additionalDataCount = {{ count($additionalData) }};
            let imgContainer = $('#image-preview');
            let deletedImages = [];

            addDataBtn.click(function () {
                additionalDataCount++;
                additionalDataContainer.append(`
                    <div class="form-group">
                        <label for="additional_data[${additionalDataCount}]">Data ${additionalDataCount + 1}</label>
                        <input name="additional_data[${additionalDataCount}]" id="additional_data[${additionalDataCount}]" type="text" class="form-control">
                    </div>
                `);
            });

            imgContainer.on('click', '.delete-img-btn', function () {
                let index = $(this).data('index');
                deletedImages.push(index);
                $(this).closest('.img-container').remove();
            });

            $('#image-upload').change(function () {
                var input = $(this)[0];
                if (input.files) {
                    Array.from(input.files).forEach(file => {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#image-preview').append(`
                                <div class="img-container" style="position: relative; margin: 5px;">
                                    <img src="${e.target.result}" style="width: 50px; height: 50px; object-fit: cover; margin-bottom: 10px;">
                                    <button type="button" class="btn btn-danger btn-sm delete-img-btn" style="position: absolute; top: 0; right: 0;">Delete</button>
                                </div>
                            `);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });

            $('form').submit(function () {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'deleted_images',
                    value: JSON.stringify(deletedImages)
                }).appendTo('form');
            });
        });
    </script>
@endsection
