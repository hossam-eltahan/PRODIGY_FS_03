@extends('admin.layouts.master')
@section('title')
    Categories Page
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categories Setting</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Categories</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
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
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Name</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.category.edit', $category->id) }}">
                                                <i class="fas fa-edit" style="font-size:15px"></i>
                                            </a>
                                            <a class="btn btn-danger delete-item"
                                                href="{{ route('admin.category.destroy', $category->id) }}">
                                                <i class="fas fa-trash" style="font-size:15px"></i>
                                            </a>
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
