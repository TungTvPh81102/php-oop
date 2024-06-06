@extends('layouts.master')

@section('title')
    Order Success
@endsection

@section('content')
    <section class="coupon-area pt-100 pb-30">
        <div class="container">
            <div class="row">
                @php
                    $vnp_SecureHash = $_GET['vnp_SecureHash'] ?? null;
                @endphp

                @if (isset($_GET['status']))
                    <span>Đặt hàng thành công</span>
                @else
                    <span>Thanh toán thất bại</span>
                @endif
            </div>
        </div>
    </section>
    <h1>Đặt hàng thành công</h1>
@endsection
