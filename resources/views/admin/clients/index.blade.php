@extends('admin.layouts.master')
@section('title')
    testimonials Page
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>testimonials Setting</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All testimonials</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
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
                                <th>Client Name</th>
                                <th>Client Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $key => $client)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->description }}</td>
                                    <td class="d-flex gap-3">
                                        <a class="btn btn-primary m-2"
                                           href="{{ route('admin.clients.edit', $client->id) }}">
                                            <i class="fas fa-edit" style="font-size:15px"></i>
                                        </a>
                                        <a class="btn btn-danger delete-item m-2"
                                           href="{{ route('admin.clients.destroy', $client->id) }}">
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
@section('js')
@endsection
