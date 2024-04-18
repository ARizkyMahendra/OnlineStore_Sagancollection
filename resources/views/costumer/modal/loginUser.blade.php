<!-- Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login <span style="color: red;">*</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 row">
          <label for="email" class="col-form-label col-sm-3">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
          </div>
        </div>
        <div class="mb-2 row">
          <label for="Password" class="col-form-label col-sm-3">Password <span style="color: red;">*</span></label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="Pesan" rows="3"></input>
          </div>
        </div>
        <p class="mt-4" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#registerModal">Belum mempunyai akun ? | <a href="#">Daftar akun</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>