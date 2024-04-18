@extends('costumer.layout.index')

@section('content')

<div class="row">
    <div class="col " >
        <div class="card mt-5">
            <div class="card-header text-center">
                Kategori
            </div>
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item" >
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Kategori #1
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="d-flex flex-column gap-4 mb-1">
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #1
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #2
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #3
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Kategori #2
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="d-flex flex-column gap-4 mb-1">
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #1
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #2
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #3
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Kategori #3
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="d-flex flex-column gap-4 mb-1">
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #1
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #2
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fa fa-plus"></i> Item #3
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-wrap d-flex col-md-9 gap-4 mb-5 mt-5">
        @if($data->isEmpty())
            <h1>Product Empty...!</h1>
            
        @else
            @foreach($data as $item)
            <div class="card" style="width: 220px;">
                <div class="card-header m-auto" >
                    <img src="{{ asset('storage/product/'.$item->image) }}" alt="" style="width: 186px; height: 225px; object-fit: cover;">
                </div>
                <div class="card-body">
                    <p class="m-auto">{{ $item->nameProduct }}</p>
                </div>
                <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                    <p class="m-0" style="font-size: 14px; font-weight: 600;"><span>Rp. </span>{{ number_format($item->price) }}</p>
                    <button class="btn btn-outline-primary flex" style="font-size: 15px">
                    <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>
            @endforeach
            
        @endif
    </div>
</div>
@endsection