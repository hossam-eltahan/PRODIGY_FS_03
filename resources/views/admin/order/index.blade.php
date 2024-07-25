<!-- resources/views/admin/order/index.blade.php -->
@extends('admin.layouts.master')
@section('title')
    Orders Page
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Orders Setting</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Orders</h4>
            </div>

            <div class="card-body">
                <div class="filters mb-4">
                    <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">All</a>
                    <a href="{{ route('admin.order.index', ['status' => 'Pending']) }}"
                       class="btn btn-warning">Pending</a>
                    <a href="{{ route('admin.order.index', ['status' => 'Completed']) }}" class="btn btn-success">Completed</a>
                    <a href="{{ route('admin.order.index', ['status' => 'Canceled']) }}"
                       class="btn btn-danger">Canceled</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>اسم العميل</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>تاريخ الطلب</th>
                            <th>الطلب</th>
                            <th>اسم المنتج</th>
                            <th>سعر المنتج</th>
                            <th>حالة الطلب</th>
                            <th>إجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->name }}</td>
                                <td>
                                    <a target="_blank" href="https://wa.me/{{$order->country_code}}{{$order->number}}">
                                        {{ $order->number }}
                                    </a>
                                </td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->offer }}</td>
                                <td>{{ $order->product ? $order->product->title : 'لا يوجد اسم' }}</td>
                                <td>{{ $order->product ? $order->product->price : 'لا يوجد اسم' }}</td>
                                <td>
                                    <span class="
                                        {{ $order->status == 'Completed' ? 'text-white bg-success p-1' :
                                           ($order->status == 'Canceled' ? 'text-white bg-danger p-1' :
                                           ($order->status == 'Pending' ? 'text-white bg-warning p-1' : '')) }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm delete-item m-1"
                                       href="{{ route('admin.order.destroy', $order->id) }}">
                                        <i class="fas fa-trash" style="font-size:15px"></i>
                                    </a>
                                    <a class="btn btn-success btn-sm m-1"
                                       href="{{ route('admin.order.updateStatus', ['id' => $order->id, 'status' => 1]) }}">
                                        Completed
                                    </a>
                                    <a class="btn btn-danger btn-sm m-1"
                                       href="{{ route('admin.order.updateStatus', ['id' => $order->id, 'status' => 2]) }}">
                                        Canceled
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
