@extends('admin.layouts.master')
@section('title')
    Company Page
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
                    <a href="{{ route('admin.company.create') }}" class="btn btn-primary">
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
                                <th>Image</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($companies as $key => $company)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>
                                        <img style="width: 100px; height: 50px;" src="{{ asset($company->image) }}"
                                             alt="">
                                    </td>
                                    <td>
                                        <a class="btn btn-primary"
                                           href="{{ route('admin.company.edit', $company->id) }}">
                                            <i class="fas fa-edit" style="font-size:15px"></i>
                                        </a>
                                        <a class="btn btn-danger delete-item"
                                           href="{{ route('admin.company.destroy', $company->id) }}">
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
