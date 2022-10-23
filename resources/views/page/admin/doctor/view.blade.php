@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Doctor List')

@section('script_head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <!-- Modal -->

    <div class="modal fade" id="experience" tabindex="-1" role="dialog" aria-labelledby="experience" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Job Location</label>
                            <input type="text" class="form-control" placeholder="Job Location" name="job_location">
                        </div>
                        <div class="form-group">
                            <label>Job Starting Date</label>
                            <input type="date" class="form-control" placeholder="Job Starting Date"
                                name="job_starting_date">
                        </div>
                        <div class="form-group">
                            <label>Job Ending Date</label>
                            <input type="date" class="form-control" placeholder="Job Ending Date" name="job_ending_date">
                        </div>
                        <div class="form-group">
                            <label>Job Description</label>
                            <textarea name="job_description" rows="5" class="form-control" name="job_description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="social" tabindex="-1" role="dialog" aria-labelledby="experience" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Soical Media Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option value="facebook">Facebook</option>
                                <option value="linkidin">Linkidin</option>
                                <option value="youtube">Youtube</option>
                                <option value="website">Personal Website</option>
                                <option value="skype">Skype</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Social Media Link</label>
                            <input type="text" class="form-control" placeholder="Social Media Link"
                                name="social_media_link">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="degree" tabindex="-1" role="dialog" aria-labelledby="experience" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Degree</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Dgree Name</label>
                            <input type="text" class="form-control" placeholder="Social Media Link"
                                name="degree_name">
                        </div>
                        <div class="form-group">
                            <label>Institute</label>
                            <input type="text" class="form-control" placeholder="Institute Name"
                                name="institute_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="compounder" tabindex="-1" role="dialog" aria-labelledby="experience"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Compounder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Compounder Name</label>
                            <input type="text" class="form-control" placeholder="Compounder Name"
                                name="compounder_name">
                        </div>
                        <div class="form-group">
                            <label>Compounder Phone</label>
                            <input type="text" class="form-control" placeholder="Compounder Phone"
                                name="compounder_phone">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="trainning" tabindex="-1" role="dialog" aria-labelledby="experience"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Trainning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Trainning Title" name="title">
                        </div>
                        <div class="form-group">
                            <label>Starting Date</label>
                            <input type="date" class="form-control" placeholder="Starting Date" name="starting_date">
                        </div>
                        <div class="form-group">
                            <label>Ending Date</label>
                            <input type="date" class="form-control" placeholder="Ending Date" name="ending_date">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="description" tabindex="-1" role="dialog" aria-labelledby="experience"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Line 01</label>
                            <textarea name="job_description" rows="3" class="form-control" name="job_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Line 02</label>
                            <textarea name="job_description" rows="3" class="form-control" name="job_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Line 03</label>
                            <textarea name="job_description" rows="3" class="form-control" name="job_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Line 04</label>
                            <textarea name="job_description" rows="3" class="form-control" name="job_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Line 05</label>
                            <textarea name="job_description" rows="3" class="form-control" name="job_description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="appointment" tabindex="-1" role="dialog" aria-labelledby="experience"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Street Address</label>
                            <input type="text" class="form-control" placeholder="Street Address"
                                name="street_address">
                        </div>
                        <div class="form-group">
                            <label>District</label>
                            <input type="text" class="form-control" placeholder="District Name" name="district">
                        </div>
                        <div class="form-group">
                            <label>Division</label>
                            <input type="text" class="form-control" placeholder="Division Name" name="division">
                        </div>
                        <div class="form-group">
                            <label>In Time</label>
                            <input type="time" class="form-control" placeholder="In Time" name="in_time">
                        </div>
                        <div class="form-group">
                            <label>Out Time</label>
                            <input type="time" class="form-control" placeholder="Out Time" name="out_time">
                        </div>
                        <div class="form-group">
                            <label>To</label>
                            <select class="form-control" name="to">
                                <option value="sunday">Sunday</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>From</label>
                            <select class="form-control" name="from">
                                <option value="sunday">Sunday</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Doctor List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Doctor List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session('status') }}
        </div>
    @endif

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools" style="float: left">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#experience">
                        Experience
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#social">
                        Social
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#degree">
                        Degree
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#compounder">
                        Compounder
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#trainning">
                        Trainning
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#description">
                        Description
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#appointment">
                        Appointment
                    </button>
                </div>
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
                <div class="row my-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-toggle="list" href="#doctor-basic-info" role="tab"
                                        aria-controls="home">Doctor Basic Info</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-toggle="list" href="#list-profile" role="tab"
                                        aria-controls="profile">Experience</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        data-toggle="list" href="#list-messages" role="tab"
                                        aria-controls="messages">Socail Link</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list"
                                        data-toggle="list" href="#list-settings" role="tab"
                                        aria-controls="settings">Degree</a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="doctor-basic-info" role="tabpanel"
                                        aria-labelledby="list-home-list">
                                        <div class="my-1">
                                            <h5>Name</h5>
                                            <p>{{ $doctor->name }}</p>
                                        </div>
                                        <div class="my-1">
                                            <h5>Email</h5>
                                            <p>{{ $doctor->email }}</p>
                                        </div>
                                        <div class="my-1">
                                            <h5>Phone</h5>
                                            <p>{{ $doctor->phone }}</p>
                                        </div>
                                        <div class="my-1">
                                            <h5>Reg No</h5>
                                            <p>{{ $doctor->reg_no }}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">



                                    </div>
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- code here --}}
                {{-- code here --}}
                {{-- code here --}}
                {{-- code here --}}
                {{-- code here --}}
                {{-- code here --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection




@section('script_footer')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        var myModal = document.getElementById('exampleModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })

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
@endsection
