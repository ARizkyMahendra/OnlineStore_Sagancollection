<!-- Modal -->
<style>
    .field-icon {
        float: right;
        /* margin-left: -50px; */
        margin-right: 25px;
        margin-top: -30px;
        position: relative;
        
    }
</style>

<div class="modal fade" id="editModalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$title}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('userManagement.update', $data->id)}}" enctype="multipart/form-data" method="post">
                @method('put')
                @csrf

                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">uid</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" id="nickname" name="nickname" value="{{$data->nickname}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">UserName</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password" value="{{password_needs_rehash($data->password,'PASSWORD_BCRYPT')}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="notlp" class="form-control" id="notlp" name="notlp" value="{{$data->notlp}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-sm-4 col-form-label">Picture</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="formFile" value="{{$data->image}}">
                            <img src="{{asset('storage/user/'.$data->image)}}" class="mb-2 preview" id="" style="width: 100px;">
                            <input class="form-control" type="file" id="formFile" accept=".png, .jpg, .jpeg" name="formFile" onchange="previewImg()">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" id="role" name="role" value="{{$data->role}}">
                                <option selected>Select Role</option>
                                <option value="1" {{$data->role == '1' ? 'selected' : ''}}>admin</option>
                                <option value="2" {{$data->role == '2' ? 'selected' : ''}}>manager</option>
                            </select>
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