@extends('admin.layouts.master');
@section('title')
    Edit Category Page
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Category Page</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" placeholder="Category Name" value="{{ $category->name }}" id="name"
                               type="text" class="form-control">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
