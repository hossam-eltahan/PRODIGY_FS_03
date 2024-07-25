@extends('admin.layouts.master');
@section('title')
    Create Category Page
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Category Page</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" placeholder="Category Name" value="{{ old('name') }}" id="name"
                            type="text" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
