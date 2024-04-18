@extends('costumer.layout.index')

@section('content')
<h4 class="mt-5">Best Seller</h4>
<div class="flex-wrap mt-3 d-flex flex-lg-wrap gap-3">
    @if($best->count() == 0)
            <h1>No best product...!</h1>
            
    @else
        @foreach($best as $item)
        <div class="card" style="width: 220px;">
            <div class="card-header m-auto">
                <img src="{{ asset('storage/product/'.$item->image) }}" alt=""
                    style="width: 186px; height: 225px; object-fit: cover;">
            </div>
            <div class="card-body">
                <p class="m-auto">{{ $item->nameProduct }}</p>
                <p class="m-0" style="font-size: 9px; font-weight: 600;"><span>terjual {{$item -> quantityOut}}</span></p>
            </div>
            <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                <p class="m-0" style="font-size: 14px; font-weight: 600;"><span>Rp. {{ number_format($item->price) }}</span></p>
                <form action="{{route('addtocart')}}" enctype="multipart/form-data" method="post">
                    
                    @csrf
                    <input type="hidden" name="idProduct" value="{{$item->id}}">
                    <button type="submit" class="btn btn-outline-primary flex" style="font-size: 15px">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    @endif  

</div>

<h4 class="mt-5">New Product</h4>
<div class="flex-wrap mt-3 d-flex flex-lg-wrap gap-3">
    @if($data->isEmpty())
            <h1>Product Empty...!</h1>
            
    @else
        @foreach($data as $item)
        <div class="card" style="width: 220px;">
            <div class="card-header m-auto">
                <img src="{{ asset('storage/product/'.$item->image) }}" alt=""
                    style="width: 186px; height: 225px; object-fit: cover;">
            </div>
            <div class="card-body">
                <p class="m-auto">{{ $item->nameProduct }}</p>
                <p class="m-0" style="font-size: 9px; font-weight: 600;"><span>terjual {{$item -> quantityOut}}</span></p>
            </div>
            <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                <p class="m-0" style="font-size: 14px; font-weight: 600;"><span>Rp. </span>{{ number_format($item->price) }}</p>
                
                <form action="{{route('addtocart')}}" enctype="multipart/form-data" method="post">
                    
                    @csrf
                    <input type="hidden" name="idProduct" value="{{$item->id}}">
                    <button type="submit" class="btn btn-outline-primary flex" style="font-size: 15px">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection