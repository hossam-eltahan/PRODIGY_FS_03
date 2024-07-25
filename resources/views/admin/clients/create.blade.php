@extends('admin.layouts.master');
@section('title')
    Create testimonials Page
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
                <form action="{{ route('admin.clients.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">client Name</label>
                        <input name="name" required placeholder="Client Name" value="{{ old('name') }}" id="name"
                               type="text" class="form-control">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">client Description</label>
                        <input name="description" required placeholder="Client Description"
                               value="{{ old('description') }}"
                               id="description"
                               type="text" class="form-control">
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $('.image-preview').css({--}}
    {{--                "background-image": "url({{ asset($box->image) }}",--}}
    {{--                "background-size": "cover",--}}
    {{--                "background-position": "center",--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
