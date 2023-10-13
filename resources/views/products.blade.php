@extends('shop')
    
@section('content')
     
<div class="row">
    @foreach($cakes as $cake)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{ asset('images') }}/{{ $cake->image }}" class="card-img-top"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $cake->name }}</h4>
                    <p>{{ $cake->detail }}</p>
                    <p class="card-text"><strong>Price: </strong> $ {{ $cake->price }} <br>(IDR : {{ $cake->price * 15000 }})</p>
                    <p class="btn-holder"><a href="{{ route('addcake.to.cart', $cake->id) }}" class="btn btn-outline-danger">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
     
@endsection