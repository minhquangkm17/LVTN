@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/img/blog/blog.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>GIỎ HÀNG</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ asset('trang-chu') }}">Trang chủ</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <form action="{{ route('payment.paymentProcessor') }}" method="post">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Sản phẩm</th>
                                        <th>Giá</th>
                                         <th>Chiết khấu</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $totalAmount = 0;
                                    @endphp
                                    @foreach ($listCart as $cart)
                                        @if ($cart['number'] > 0)
                                            @php
                                                $amount = $cart->product['product_price'] * $cart['number'] - $cart->product['product_price'] * ($cart->product['discount'] / 100);
                                                $total += $amount;
                                                $money = $cart->product['product_price'] * $cart['number'];
                                                $totalAmount += $money;
                                            @endphp
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <img class="cart_img"
                                                        src="{{ asset($cart->product['product_img']) }}"
                                                        alt="Đang tải hình ảnh">
                                                    <h5>{{ $cart->product['product_name'] }}</h5>
                                                </td>
                                                <td class="shoping__cart__price">
                                                    {{ number_format($cart->product['product_price'], 0, ',', '.') }}
                                                </td>
                                                <td class="shoping__cart__price">{{ $cart->product['discount'] }}%</td>
                                                <td class="shoping__cart__quantity">
                                                    <div class="button">
                                                        <button type="button" class="icon_close"
                                                            data-url="{{ route('cart.removeCart') }}"
                                                            data-id="{{ $cart->product['id'] }}">-
                                                        </button>
                                                        {{-- <button class="icon_close"
                                                            data-id="{{ $cart->product['id'] }}"
                                                            data-url="{{ route('cart.removeCart') }}"><i
                                                                class="fa-solid fa-minus"></i></button> --}}
                                                        <input type="hidden" name="product_id[]"
                                                            value="{{ $cart->product['id'] }}">
                                                        <label>
                                                            <input class="pro-qty" name="number[]" type="number"
                                                                value="{{ $cart['number'] }}">
                                                        </label>
                                                        <button type="button"
                                                            data-url="{{ route('cart.addCart', $cart->product['id']) }}"
                                                            class="add-cart"><i class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="shoping__cart__total">
                                                    {{ number_format($amount, 0, ',', '.') }}
                                                    <input type="hidden" value="{{ $amount }}">
                                                </td>
                                                <td class="shoping__cart__item__close">
                                                    <a href="{{ route('cart.delItem',$cart->id) }}"><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end">
                    <label for="full_name" class="form-control-label">Họ và tên</label>
                    <input type="text" name="full_name" class="form-control" id="full_name"
                        value="{{ auth()->user()->user_detail['full_name'] }}">
                </div>
                <div class="row d-flex justify-content-end">
                    <label for="address" class="form-control-label">Địa chỉ nhận hàng</label>
                    <br />
                    <textarea class="form-control" type="text" name="address" id="address" rows="3">
                    {{ auth()->user()->user_detail['address']}}</textarea>
                </div>
                <div class="row d-flex justify-content-end">
                    <label for="note" class="form-text">Ghi chú</label>
                    <br />
                    <textarea class="form-control" type="text" name="note" id="note" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ asset('san-pham') }}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Thanh toán</h5>
                            <ul>
                                <li>Giá gốc <span>{{ number_format($totalAmount ?? 0, 0, ',', '.') }}VND</span></li>
                                <li>Thành tiền <span>{{ number_format($total ?? 0, 0, ',', '.') }}VND</span></li>
                                <input type="hidden" name="total" id="total" value="{{ $total }}">
                                <input type="hidden" name="amount" id="total" value="{{ $totalAmount }}">
                            </ul>
                            <div class="d-flex justify-between" style="justify-content: space-around;">
                                <input type="submit" name="momo" class="btn-info mr-3 col-6" value="Thanh toán Momo" />
                                <input type="submit" name="money" class="primary-btn col-6" value="Đặt hàng COD" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@push('scripts')
    <script !src="">
        $(document).ready(function() {
            ajaxAddCart();
            ajaxRemoveCart();
        });
    </script>
@endpush
