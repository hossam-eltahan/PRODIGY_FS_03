@extends('admin.layouts.master');
@section('title')
    Edit testimonials Page
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create testimonials Page</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create testimonials</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.clients.update',$client->id) }}" enctype="multipart/form-data"
                      method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">client Name</label>
                        <input name="name" required placeholder="Client Name" value="{{$client->name}}" id="name"
                               type="text" class="form-control">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">client Description</label>
                        <input name="description" required placeholder="Client Description"
                               value="{{ $client->description }}"
                               id="description"
                               type="text" class="form-control">
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
