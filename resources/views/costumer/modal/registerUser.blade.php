<!-- Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 row">
          <label for="name" class="col-form-label col-sm-3" >Nama Pengguna <span style="color: red;">*</span></label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="name" required>
          </div>
        </div>
      
        <div class="mb-3 row">
          <label for="email" class="col-form-label col-sm-3">Email <span style="color: red;">*</span></label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="email" required>
          </div>
        </div>
      
        <div class="mb-3 row">
          <label for="number" class="col-form-label col-sm-3">No. Telephon <span style="color: red;">*</span></label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="notlf" placeholder="+62xx xxxx xxxx" required>
          </div>
        </div>

        <div class="mb-2 row">
          <label for="Password" class="col-form-label col-sm-3">Password <span style="color: red;">*</span></label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="Pesan" rows="3" required></input>
          </div>
        </div>

        <p class="mt-4" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#loginModal">Telah memiliki akun ? | <a href="#">Masuk</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Daftar</button>
      </div>
    </div>
  </div>
</div>