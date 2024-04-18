@extends('costumer.layout.index')

@section('content')

<form action="{{ route('checkout.payment')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-8 mt-5">
            <div class="card mb-5">
                <div class="card-body ekspedisi">
                    <h3>Masukan alamat anda</h3>
                    <div class="row mt-3">
                        <label for="nama_penerima" class="col-form-label col-sm-3">Nama Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Masukan nama penerima" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="alamat_penerima" class="col-form-label col-sm-3">alamat Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat_penerima" name="alamat_penerima" placeholder="Masukan alamat penerima" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="notlf" class="col-form-label col-sm-3">no tlp pemerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="notlf" name="notlf" placeholder="Masukan nomor telephon" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="ekspredisi" class="col-form-control col-sm-3">Ekspedisi</label>
                        <div class="col-sm-9 ">
                            <select name="ekspedisi" id="ekspedisi" class="form-control eksp">
                                <option value="">-- Pilih Ekspedisi --</option>
                                <hr>
                                <option value="jnt">J&T Express</option>
                                <option value="jne">JNE Express</option>
                                <option value="sicepat">Sicepat Express</option>
                                <option value="ninja">Ninja Express</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-sm-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Total Belanja</h3>
                </div>
                <div class="card-body pembayaran">
                    <h3 class="mb-3">{{$codeTransaktion}}</h3>
                    <input type="hidden" name="code" value="{{$codeTransaktion}}">
                    <div class="row mb-3">
                        <label for="totalBelanja" class="col col-form-label">Total Belanja</label>
                        <div class="col-sm-auto">
                            <input type="number" class="form-control totalBelanja" id="totalBelanja" name="totalBelanja" value="{{$detailBelanja}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="discount" class="col col-form-label ">Discount</label>
                        <div class="col-sm-auto">
                            @if (Auth::user())
                                <input type="number" class="form-control discount" id="discount" name="discount" value="0.1" disabled>
                            @else
                                <input type="number" class="form-control discount" id="discount" name="discount" value="0" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="PPn" class="col col-form-label">PPn 11%</label>
                        <div class="col-sm-auto">
                            <input type="number" class="form-control ppn" id="PPn" name="PPn" value="0" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ongkir" class="col col-form-label">ongkir</label>
                        <div class="col-sm-auto">
                            <input type="number" class="form-control ongkir" id="ongkir" name="ongkir" value="0" disabled>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label for="price" class="col col-form-label">Total</label>
                        <div class="col-sm-auto">
                            <input type="text" class="form-control" id="dibayarkan" name="dibayarkan">
                        </div>
                    </div>
                    <input type="hidden" name="totalQty" value="{{$totalQty,}}">
                    <input type="hidden" name="totalBarang" value="{{$totalBarang}}">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fa fa-print"></i>
                        print struck
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection