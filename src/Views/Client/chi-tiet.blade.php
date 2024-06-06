@extends('layouts.master')

@section('title')
    Sản phẩm
@endsection

@section('content')
    <section class="contact__area pb-100 pt-95">
        <div class="container d-flex">

            <div class="card">
                <div class="card-body">

                    <h1 class="card-title">{{ $data['name'] }}</h1>
                    <img style="width: 100px" src="{{ asset($data['thumbnail']) }}" alt="">
                    <span>{{ $data['price_regular'] }}</span>
                    <span>{{ $data['discount'] ?? null }}</span>

                    <form action="{{ url('cart/add') }}?productID={{ $item['id'] }}">
                        <input type="hidden" name="productID" value="{{ $data['id'] }}">
                        <input value="1" class="form-control" type="text " type="number" min="1"
                            name="quantity">
                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endSection
