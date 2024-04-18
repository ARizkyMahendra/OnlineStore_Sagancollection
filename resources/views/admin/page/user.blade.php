@extends('admin.layout.index')

@section('content')

<div class="pagetitle">
    <h1>User Management</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">User Management</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-ms-12">
            <div class="card mb-1">
                <div class="card-header bg-transparent">
                    <button class="btn btn-info" id="addData">
                        <i class="bi bi-plus">
                            <span>Add User</span>
                        </i>
                    </button>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tablesorter ">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th scope="col">No</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Join Date</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $y => $item)
                                <tr class="text-center align-middle">
                                    <th>{{++$y}}</th>
                                    <th><img src="{{asset('storage/user/'.$item->image)}}" style="width: 100px;"></th>
                                    <td>{{$item -> nickname}}</td>
                                    <td>{{$item -> created_at}}</td>
                                    <td>{{$item -> name}}</td>
                                    <td>
                                        <span class="badge text-bg-{{ $item->role === 1 ? 'info' : 'success' }}">{{ $item->role === 1 ? 'Admin' : 'Manager' }}</span>
                                    </td>
                                    <td>
                                        <span class="badge text-bg-{{ $item->isActive === 1 ? 'success' : 'danger' }}">{{ $item->isActive === 1 ? 'Active' : 'No Active' }}</span>
                                    </td>

                                    <td>
                                        <button class="btn btn-info editModalUser" data-id="{{$item->id}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <button class="btn btn-danger deleteData" data-id="{{$item->id}}">
                                            <i class=" bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<div class="tampilData" style="display: none;"></div>
<div class="tampilEditData" style="display: none;"></div>
<script>
    $('#addData').click(function() {
        $.ajax({
            url: "{{route('addModal.user')}}",
            success: function(response) {
                $('.tampilData').html(response).show();
                $('#addModalUser').modal('show');
            }
        });
    });

    $('.editModalUser').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "{{route('userManagement.edit',['id'=>':id'])}}".replace(':id', id),
            success: function(response) {
                $('.tampilEditData').html(response).show();
                $('#editModalUser').modal('show');
            }
        });
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    })

    $('.deleteData').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var nickname = $('#nickname').val();
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            },
        });

        Swal.fire({
            title: 'Hapus data ?',
            text: "Kamu yakin untuk menghapus Uid" + nickname + " ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('userManagement.destroy', ['id' => ':id']) }}".replace(':id', id),
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Toast.fire({
                                icon: "success",
                                title: response.success,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan notifikasi error jika terjadi kesalahan
                        Swal.fire({
                            title: 'Error',
                            text: 'Terjadi kesalahan saat menghapus data',
                            icon: 'error'
                        });
                    }
                });
            }
        })
    });
</script>

@endsection