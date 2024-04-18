@extends('costumer.layout.index')

@section('content')
<div class="row mt-5 align-items-center">
    <div class="col-md-6">
        <div class="content-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Corporis saepe nulla hic quos nesciunt aperiam iste itaque tempore fugit iusto
            quia quisquam in, exercitationem, vero explicabo numquam corrupti voluptatibus
            enim possimus sed quasi ratione eveniet. Quibusdam reiciendis facere, atque
            ratione perferendis molestiae beatae delectus nesciunt laudantium sit consectetur
            illum officiis.
        </div>
    </div>
    <div class="col-md-6 text-center mt-2">
        <img src="{{asset('assets/images/logo.jpg')}}" style="width: 50%;" alt="">
    </div>
</div>

<div class="row d-flex text-center mt-5" >
    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <i class="fa fa-users da-2x"></i>
        <p class="m-0 fs-6">+ 100 pelanggan</p>
    </div>
    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <i class="fa-solid fa-box"></i>
        <p class="m-0 fs-6">+ 100 pengiriman</p>
    </div>
    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <i class="fa-solid fa-bed"></i>
        <p class="m-0 fs-6">+ 100 produk</p>
    </div>
</div>

<h5 class="text-center mt-md-5 mb-md-2 mt-5"> Contact Us </h5>
<hr class="mb-5">
<div class="row mb-md-5 mt-4">
    <div class="col-md-5">
        <!-- <div class="bg-secondary" style="width: 100%; height: 40vh; border-radius: 10px;"></div> -->
        <img src="{{asset('assets/images/message.png')}}" alt="" style="width: 100%; height: 60hv;">
    </div>
    <div class="col-md-7">
        <div class="card mb-4">
            <div class="card-header text-center">
                <h3>Pesan</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3 row">
                    <label for="Pesan" class="form-label">Kritik dan Saran</label>
                    <textarea class="form-control" id="Pesan" rows="3"></textarea>
                </div>
                <button class="btn btn-primary mt-2 w-100">Kirim pesan</button>
            </div>
        </div>
    </div>
</div>
@endsection