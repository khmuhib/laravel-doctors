@extends('layouts.base_admin.base_dashboard')@section('judul', 'Disease List')

@section('script_head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Doctor's Degree Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0" style="margin: 20px">
                <table id="previewAkun" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diseases as $disease)
                            <tr>
                                <td>{{ $disease->name }}</td>
                                <td>{{ $disease->description }}</td>
                                <td><small
                                        class="{{ $disease->status == '1' ? 'bg-danger' : 'bg-success' }} p-1 rounded">{{ $disease->status == '1' ? 'Inactive' : 'Active' }}</small>
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/'.$disease->image) }}"
                                        alt="" style="height: 50px; width: 50px">
                                </td>
                                <td>
                                    <a href="{{ route('admin.disease.edit', ['id' => $disease->id]) }}">Edit</a>
                                    <a href="{{ route('admin.disease.delete', ['id' => $disease->id]) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
{{-- @section('script_footer')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#previewAkun').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": {
                    "url": "{{ route('akun.dataTable') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "columns": [{
                    "data": "name"
                }, {
                    "data": "email"
                }, {
                    "data": "user_image"
                }, {
                    "data": "options"
                }],
                "language": {
                    "decimal": "",
                    "emptyTable": "There is no data",
                    "info": "Displays _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Show _MENU_ entry",
                    "loadingRecords": "Loading...",
                    "processing": "Retrieving Data...",
                    "search": "Search:",
                    "zeroRecords": "No matching data found",
                    "paginate": {
                        "first": "First",
                        "last": "last",
                        "next": "next",
                        "previous": "previous"
                    },
                    "aria": {
                        "sortAscending": ": enable to sort column ascending",
                        "sortDescending": ": enable to sort descending column"
                    }
                }

            });

            // clear data
            $('#previewAkun').on('click', '.hapusData', function() {
                var id = $(this).data("id");
                var url = $(this).data("url");
                Swal
                    .fire({
                        title: 'Are you sure?',
                        text: "You will not be able to return this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete!',
                        cancelButtonText: 'Cancelled'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            // console.log();
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    // console.log();
                                    Swal.fire('Terhapus!', response.msg, 'success');
                                    $('#previewAkun').DataTable().ajax.reload();
                                }
                            });
                        }
                    })
            });
        });
    </script>
@endsection --}}
