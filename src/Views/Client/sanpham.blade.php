@extends('layouts.master')

@section('title')
    Sản phẩm
@endsection

@section('content')
    <section class="contact__area pb-100 pt-95">
        <div class="container d-flex">
            @foreach ($data as $item)
                <div class="card me-4">
                    <a href="{{ url('chi-tiet/' . $item['id']) }}" class="card-title">{{ $item['name'] }}</a>
                    <div class="card-body">
                        <img style="width: 100px" src="{{ asset($item['thumbnail']) }}" alt="">
                        <p>{{ $item['price_regular'] }}</p>
                        <a href="{{ url('cart/add') }}?quantity=1&productID={{ $item['id'] }}" class="btn btn-primary">Add
                            to
                            cart</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endSection
