<!-- Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$title}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('updateData', $data->id)}}" enctype="multipart/form-data" method="post">
                @method('put')
                @csrf

                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">SKU</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" id="sku" name="sku" value="{{$data->sku}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Product Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="productName" name="productName" value="{{$data->nameProduct}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Product Type</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" id="type" name="type" value="{{$data->type}}">
                                <option selected>Pilih Type</option>
                                <option value="jepang" {{$data->type == 'jepang' ? 'selected' : ''}}>Jepang</option>
                                <option value="lokal" {{$data->type == 'lokal' ? 'selected' : ''}}>Lokal</option>
                                <option value="katunJepang" {{$data->type == 'katunJepang' ? 'selected' : ''}}>Katun jepang</option>
                                <option value="katunLokal" {{$data->type == 'katunLokal' ? 'selected' : ''}}>Katun lokal</option>
                                <option value="lainlain" {{$data->type == 'lainlain' ? 'selected' : ''}}>lain-lain</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Product Category</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" id="category" name="category">
                                <option selected>Pilih Category</option>
                                <option value="sprei" {{$data->category == 'sprei' ? 'selected' : ''}}>Sprei</option>
                                <option value="bedcover" {{$data->category == 'bedcover' ? 'selected' : ''}}>Bed cover</option>
                                <option value="speriBedcover" {{$data->category == 'speriBedcover' ? 'selected' : ''}}>Sprei + Bed cover</option>
                                <option value="lainlain" {{$data->category == 'lainlain' ? 'selected' : ''}}>lain-lain</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Price</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="price" name="price" value="{{$data->price}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Qty Product</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$data->quantity}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-sm-4 col-form-label">Picture</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="formFile" value="{{$data->image}}">
                            <img src="{{asset('storage/product/'.$data->image)}}" class="mb-2 preview" style="width: 100px;">
                            <input class="form-control" type="file" id="formFile" accept=".png, .jpg, .jpeg" name="formFile" onchange="previewImg() " value="{{$data->image}}">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImg() {

        const foto = document.querySelector('#formFile');
        const preview = document.querySelector('.preview');

        preview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);
        oFReader.onload = function(ofReven) {
            preview.src = ofReven.target.result;
        }
    }
</script>