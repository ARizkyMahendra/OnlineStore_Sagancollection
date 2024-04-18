@extends('costumer.layout.index')
<style>
    
</style>
@section('content')
<h2 class="mt-5">Transaksi</h2>
@if (!$data)
@else
    @foreach ($data as $item)
        <div class="card mt-2" >
            <div class="card-body d-flex flex-wrap gap-4">
                <img src="{{asset('storage/product/'. $item->product->image)}}"  style="width: 100px; height: 125px; object-fit: cover;">
                <form action="{{ route('checkout.product',['id' => $item->id]) }}" method="post">
                    @csrf
                    <div class="desc">
                        <p style="font-size: 24px; font-weight: 500;">{{ $item->product->nameProduct }}</p>
                        <input type="hidden" name="idProduct" value="{{$item -> product -> id}}">
                        <span>
                            <label for="" class="fs-3">Rp.</label>
                            <input type="number" class="control-form border-0 fs-3 mb-1" name="harga" id="harga" value="{{ $item->product->price }}" readonly></input >
                        </span>
                        <p style="font-size: 14px;">quantity :
                            <span>
                                <button class="btn btn-block bg-secondary p-2 minus" style="color: white;" id="minus">-</button>
                                <input type="number" name="qty" id="qty" value="{{ $item->Qty }}" class="text-center" readonly>
                                <button class="btn btn-block bg-secondary p-2 plus" style="color: white;" id="plus">+</button>
                            </span>
                        </p>
                        <hr width="100%">
                        <div class="d-flex mt-2 gap-3">
                            <label for="price" class="fs-5">Total Rp.</label>
                            <input type="number" class=" border-0 fs-5 total" name="total" readonly id="total">
                        </div>
                        <div class="d-flex w-10 gap-3 mt-3">

                            <button type="submit" class="btn btn-success col-sm-6">
                                <i class="fa fa-shopping-cart" style="font-size: 12px;"><span style="font-family: sans-serif;"> Checkout</span></i>
                            </button>

                            <button type="button" class="btn btn-danger col-sm-6">
                                <i class="fa fa-trash-alt " style="font-size: 12px;"><span style="font-family: sans-serif;"> Delete</span></i>
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endif


@endsection