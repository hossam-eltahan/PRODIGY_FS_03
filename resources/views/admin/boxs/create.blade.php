@extends('admin.layouts.master');
@section('title')
    Create Boxs Page
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Boxs Page</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Boxs</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.boxs.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Box Title</label>
                        <input name="title" required placeholder="Box Title" value="{{ old('title') }}" id="title"
                               type="text" class="form-control">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" required name="image" id="image-upload">
                        </div>
                        @error('image')
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
