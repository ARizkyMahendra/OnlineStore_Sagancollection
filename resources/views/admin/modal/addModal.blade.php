<!-- Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$title}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('addData')}}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="modal-body">
                    
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">SKU</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="sku" name="sku" value="{{$sku}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Product Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="productName" name="productName">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Product Type</label>
                            <div class="col-sm-8">
                                <select class="form-select" aria-label="Default select example" id="type" name="type">
                                    <option selected>Pilih Type</option>
                                    <option value="jepang">Jepang</option>
                                    <option value="lokal">Lokal</option>
                                    <option value="katunJepang">Katun jepang</option>
                                    <option value="katunLokal">Katun lokal</option>
                                    <option value="katunLokal">lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Product Category</label>
                            <div class="col-sm-8">
                                <select class="form-select" aria-label="Default select example" id="category" name="category">
                                    <option selected>Pilih Category</option>
                                    <option value="sprei">Sprei</option>
                                    <option value="bedcover">Bed cover</option>
                                    <option value="speriBedcover">Sprei + Bed cover</option>
                                    <option value="speriBedcover">lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Qty Product</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="quantity" name="quantity">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="image" class="col-sm-4 col-form-label">Picture</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="file" id="formFile" accept=".png, .jpg, .jpeg" name="formFile">
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