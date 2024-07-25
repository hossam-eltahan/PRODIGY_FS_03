@extends('admin.layouts.master')
@section('title', 'Create Product Page')
    @section('content')
        <section class="section">
            <div class="section-header">
                <h1>Create Product Page</h1>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Create Product</h4>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('admin.product.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">اسم المنتج</label>
                            <input name="title" required placeholder="title" value="{{ old('title') }}" id="title"
                                   type="text" class="form-control">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">وصف المنتج</label>
                            <input name="description" required placeholder="description"
                                   value="{{ old('description') }}"
                                   id="description" type="text" class="form-control">
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">السعر</label>
                            <input name="price" required placeholder="price" value="{{ old('price') }}" id="price"
                                   type="text" class="form-control">
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="additional_data">بيانات إضافية</label>
                            <div id="additional-data-container"></div>
                            <button type="button" id="add-data-button" class="btn btn-secondary mt-2">إضافة بيانات
                            </button>
                        </div>
                        <div class="form-group">
                            <label for="product">المتبقي بالمخزون</label>
                            <input name="product" required placeholder="product" value="{{ old('product') }}"
                                   id="product"
                                   type="number" class="form-control">
                            @error('product')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">صورة المنتج</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" required name="image[]" multiple id="image-upload">
                            </div>
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">قئة المنتج</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <button class="btn btn-primary" type="submit">انشاء</button>
                    </form>
                </div>
            </div>
        </section>
    @endsection

    @section('js')
        <script>
            document.getElementById('add-data-button').addEventListener('click', function () {
                var container = document.getElementById('additional-data-container');
                var input = document.createElement('input');
                input.type = 'text';
                input.name = 'additional_data[]';
                input.placeholder = 'Enter additional data';
                input.classList.add('form-control', 'mt-2');
                container.appendChild(input);
            });
        </script>
    @endsection
