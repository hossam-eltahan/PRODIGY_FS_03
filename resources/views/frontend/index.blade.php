@extends('frontend.layouts.master')
@section('content')
    <!-- Swiper -->
    <div class="swiper-container">
        <h1>مجموعة تبييض الأسنان</h1>
        <div class="swiper-wrapper">
            @foreach ($products as $product)
                <div class="swiper-slide">
                    <div class="slide-content">
                        <a class="text-decoration-none" href="{{ route('product-details', ['id' => $product->id]) }}">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->title }}"/>
                            <h3>{{ Str::limit($product->title, 20 ,'Read More') }}</h3>
                            {{--                            <h3>{{ $product->title, 50) }}</h3>--}}
                            <p>{{ Str::limit($product->description,30) }}</p>
                        </a>
                    </div>
                </div>
            @endforeach
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
            <h3 class="text-center my-4">الباقي في المخزون من احدث المنتجات</h3>
            <div class="row d-flex align-items-center justify-content-between gap-4">
                @foreach ($products->take(6) as $key => $product)
                    <div
                        class="col-lg-3 d-flex mx-auto align-items-center justify-content-between col-md-4 col-sm-6 bg-dark rounded-lg">
                        <div class="text w-100">
                            <a class="text-decoration-none d-flex flex-column align-items-center"
                               href="{{ route('product-details', ['id' => $product->id]) }}">
                                <img class="img-fluid" style="width: 100%; height: 150px; margin: 10px 0"
                                     src="{{ asset($product->image) }}" alt=""/>
                                <p class="text-center text-white rounded-lg">متبقي في المخزون فقط <span
                                        class="text-warning">{{ $product->price }}</span> قطعة</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--Product  -->

    <!-- Testimonial -->

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

        <form id="contact" class="order-form bg-white shadow-sm p-5 rounded-md rtl" action="{{ route('send-form') }}"
              method="post">
            @csrf
            @method('POST')
            <div class="mb-3 form-group">
                <label for="name" class="form-label">الاسم كاملا *</label>
                <input type="text" id="name" name="name" required class="form-control" placeholder="الاسم كاملا"/>
            </div>
            <div class="mb-3 form-group">
                <label for="number" class="form-label">الجوال *</label>
                <div class="input-group">
                    <select class="form-select" name="country_code" id="country_code">
                        <option value="+966">السعودية (+966)</option>
                        <option value="+971">الإمارات (+971)</option>
                        <option value="+973">البحرين (+973)</option>
                        <option value="+965">الكويت (+965)</option>
                        <option value="+968">عمان (+968)</option>
                        <option value="+974">قطر (+974)</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 form-group">
                <label for="number" class="form-label">رقم الجوال *</label>
                <input type="number" name="number" value="{{old('name')}}" required class="form-control" id="number"
                       placeholder="رقم الجوال"/>
            </div>
            <div class="mb-3 form-group">
                <label for="address" class="form-label">العنوان وطلبك *</label>
                <textarea class="form-control" name="address" id="address"></textarea>
            </div>
            <div class="mb-3 form-group">
                <label class="form-label">اختر العرض:</label>
                <div
                    class="form-check p-3 d-flex align-items-center justify-content-between mb-2 border bg-light rounded">
                    <label class="form-check-label mr-auto" for="offer1">اشترى 1 بسعر 199 ريال +25 رسوم توصيل</label>
                    <input class="form-check-input ml-2" type="radio" id="offer1" name="offer"
                           value="اشترى 1 بسعر 199 ريال +25 رسوم توصيل"/>
                </div>
                <div
                    class="form-check d-flex align-items-center justify-content-between p-3 mb-2 border bg-light rounded">
                    <label class="form-check-label mr-auto" for="offer2">اشترى 2 بسعر 329 ريال (توصيل مجاني)</label>
                    <input class="form-check-input ml-2" type="radio" id="offer2" name="offer"
                           value="اشترى 2 بسعر 329 ريال (توصيل مجاني)"/>
                </div>
                <div
                    class="form-check d-flex align-items-center justify-content-between p-3 mb-2 border bg-light rounded">
                    <label class="form-check-label mr-auto" for="offer3">اشترى 3 بسعر 399 ريال (توصيل مجاني)</label>
                    <input class="form-check-input ml-2" type="radio" id="offer3" name="offer"
                           value="اشترى 3 بسعر 399 ريال (توصيل مجاني)"/>
                </div>
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
