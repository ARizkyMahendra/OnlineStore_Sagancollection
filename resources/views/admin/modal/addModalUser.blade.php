<!-- Modal -->
<div class="modal fade" id="addModalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$title}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('userManagement.add')}}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="modal-body" >

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">uid</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" id="nickname" name="nickname" value="{{$nickname}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label" >UserName</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name"  > 
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="notlp" class="form-control" id="notlp" name="notlp">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-sm-4 col-form-label">Profile Picture</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="file" id="formFile" accept=".png, .jpg, .jpeg" name="formFile">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" id="role" name="role">
                                <option selected>Select Role</option>
                                <option value="1">admin</option>
                                <option value="2">manager</option>
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