@extends('admin.layout.index')

@section('content')

<div class="pagetitle">
    <h1>Product</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
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
                            <span>Add Product</span>
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
                                    <th scope="col">Date</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->isEmpty())
                                <tr class="text-center">
                                    <td colspan="10">Product Empty..!</td>
                                </tr>

                                @else
                                    @foreach($data as $y => $item)
                                    <tr class="text-center align-middle">
                                        <th>{{++$y}}</th>
                                        <th><img src="{{asset('storage/product/'.$item->image)}}" style="width: 100px; height: 110px;"></th>
                                        <td>{{$item -> created_at}}</td>
                                        <td>{{$item -> sku}}</td>
                                        <td>{{$item -> nameProduct}}</td>
                                        <td>{{$item -> type}}</td>
                                        <td>{{$item -> category}}</td>
                                        <td>{{$item -> quantity}}</td>
                                        <td>{{$item -> price}}</td>

                                        <td>
                                            <button class="btn btn-info editModal" data-id="{{$item->id}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button class="btn btn-danger deleteData" data-id="{{$item->id}}">
                                                <i class=" bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="tampilData" style="display: none;"></div>
<div class="tampilEditData" style="display: none;"></div>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    })

    $('#addData').click(function() {
        $.ajax({
            url: "{{route('addModal')}}",
            success: function(response) {
                $('.tampilData').html(response).show();
                $('#addModal').modal('show');
            }
        });
    });

    $('.editModal').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "{{route('editModal',['id'=>':id'])}}".replace(':id', id),
            success: function(response) {
                $('.tampilEditData').html(response).show();
                $('#editModal').modal('show');
            }
        });
    });

    $('.deleteData').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var sku = $('#sku').val();
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
            text: "Kamu yakin untuk menghapus SKU " + sku + " ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('deleteData', ['id' => ':id']) }}".replace(':id', id),
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