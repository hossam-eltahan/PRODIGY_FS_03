@extends('frontend.layouts.master')
@section('content')
    <!-- Swiper -->
    <div class="container">
        <h1 class="text-center my-4">{{ $product->title }}</h1>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @php
                    $imgPaths = json_decode($product->image, true);
                @endphp
                @if($imgPaths)
                    @foreach ($imgPaths as $image)
                        <div class="swiper-slide">
                            <div class="slide-content">
                                <img src="{{ asset($image) }}" alt="{{ $product->title }}"
                                     style="max-width: 100%; width: 100%; height: 250px;"/>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No images found for this product.</p>
                @endif
            </div>
        </div>
        <div class="product-description text-right">
            <p>مواصفات المنتج :{{ $product->description }}</p>
            <h5> سعر القطعة الواحدة: {{ $product->price }}</h5>
        </div>
    </div>

    <!-- Swiper -->

    <!-- Section 2 -->
    <div class="boxs">
        <div class="container">
            <h3 class="text-center my-4">شعارنا في العمل</h3>
            <div class="row">
                @foreach ($boxes as $key => $box)
                    <div class="col-lg-3 mb-2">
                        <img style="width: 100%; max-width: 100%; height: 100px" src="{{ asset($box->image) }}"
                             alt=""/>
                        <h5 class="text-center">{{$box->title}}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Section 2 -->
    <!--Product  -->
    <div class="product">
        <div class="container">
            <h3 class="text-center bg-dark text-white my-4 py-3">
                الباقي في المخزون <span class="text-warning">{{$product->price}}</span>
                من احدث المنتجات

            </h3>
        </div>
    </div>

    <!--Product  -->

    <div class="swiper-container testimonial-swiper">
        <div class="swiper-wrapper">
            @foreach($clients as $key => $client)
                <div class="swiper-slide">
                    <div class="testimonial-content">
                        <p>
                            <span>{{$client->description}}</span>
                        </p>
                        <div class="testimonial-author">
                            <span>
                                {{$client->name}}
                            </span>
                            <div class="rating">
                                <span>★★★★★</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Add more slides as needed -->
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <!-- Testimonial -->

    <!-- Timer -->
    <div class="timer-container">
        <h2>باقي على انتهاء الخصم</h2>
        <div class="timer">
            <div class="time-unit">
                <span id="days">0</span>
                <div>أيام</div>
            </div>
            <div class="time-unit">
                <span id="hours">0</span>
                <div>ساعات</div>
            </div>
            <div class="time-unit">
                <span id="minutes">0</span>
                <div>دقائق</div>
            </div>
            <div class="time-unit">
                <span id="seconds">0</span>
                <div>ثواني</div>
            </div>
        </div>
    </div>
    <!-- Timer -->
    <!-- Payment Form -->
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="contact" class="order-form bg-white shadow-sm p-2 my-5 rounded-md rtl"
              action="{{ route('send-form') }}" method="post">
            <h4 class="text-center mb-5">الدفع عند التسليم</h4>
            @csrf
            @method('POST')
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="mb-3 form-group">
                <label for="name" class="form-label">الاسم كاملا *</label>
                <input type="text" id="name" name="name" required class="form-control" placeholder="الاسم كاملا"/>
            </div>
            <div class="mb-3 form-group">
                <label for="number" class="form-label">الجوال *</label>
                <div class="input-group">
                    <select class="form-select" name="country_code" id="country_code">
                        <option value="+966">السعودية (+966)</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 form-group">
                <label for="number" class="form-label">رقم الجوال *</label>
                <input type="number" name="number" value="{{ old('name') }}" required class="form-control" id="number"
                       placeholder="رقم الجوال"/>
            </div>
            <div class="mb-3 form-group">
                <label for="address" class="form-label">العنوان *</label>
                <textarea class="form-control" name="address" id="address"></textarea>
            </div>
            <div class="mb-3 form-group">
                <label class="form-label">اختر العرض:</label>
                @if($product->additional_data)
                    @php
                        $additionalData = json_decode($product->additional_data, true);
                    @endphp
                    @if($additionalData)
                        @foreach($additionalData as $key => $data)
                            <div
                                class="form-check p-3 d-flex align-items-center justify-content-between mb-2 border bg-light rounded">
                                <label class="form-check-label mr-auto" for="offer{{ $key }}">{{ $data }}</label>
                                <input class="form-check-input ml-2" type="radio" id="offer{{ $key }}" name="offer"
                                       value="{{ $data }}"/>
                            </div>
                        @endforeach
                    @else
                        <div
                            class="form-check p-3 d-flex align-items-center justify-content-between mb-2 border bg-light rounded">
                            <label class="form-check-label mr-auto" for="offer_default">اشترى 1
                                بسعر {{ $product->price }} ريال</label>
                            <input class="form-check-input ml-2" type="radio" id="offer_default" name="offer"
                                   value="اشترى 1 بسعر {{ $product->price }} ريال"/>
                        </div>
                    @endif
                @else
                    <div
                        class="form-check p-3 d-flex align-items-center justify-content-between mb-2 border bg-light rounded">
                        <label class="form-check-label mr-auto" for="offer_default">اشترى 1 بسعر {{ $product->price }}
                            ريال</label>
                        <input class="form-check-input ml-2" type="radio" id="offer_default" name="offer"
                               value="اشترى 1 بسعر {{ $product->price }} ريال"/>
                    </div>
                @endif
            </div>
            <button type="submit" class="submit-btn btn btn-primary w-100">تأكيد الطلب</button>
        </form>
    </div>
    <!-- Payment Form -->
    <!--company  -->
    <div class="company my-4">
        <div class="container">
            <h4 class="title text-center mb-3">نحن نشحن بضائعنا مع شركة</h4>
            <div class="row d-flex align-items-center justify-content-center">
                @foreach($companies as $key=>$company)
                    <div class="col-lg-3 my-2 col-md-6 d-flex align-items-center justify-content-center">
                        <div class="company text-center">
                            <h5>
                                {{$company->name}}
                            </h5>
                            <img src="{{ asset($company->image) }}" alt="{{$company->name}}"/>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--company  -->
@endsection

@section('js')
@endsection
