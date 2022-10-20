@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Disease Add')

@section('script_head')


    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Doctor Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Doctor Edit</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Succeed!</h4>
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div class="">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="post" enctype="multipart/form-data"
            action="{{ route('admin.doctor.update', ['id' => $doctor->id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Enter Doctor Information</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Doctor Name"
                                    value="{{ $doctor->name }}" autocomplete="name">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address"
                                    value="{{ $doctor->email }}" autocomplete="email">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"
                                    value="{{ $doctor->phone }}" autocomplete="phone">
                            </div>

                            <div class="form-group">
                                <label>Reg No</label>
                                <input type="text" name="reg_no" class="form-control"
                                    placeholder="Enter Registration Number" value="{{ $doctor->reg_no }}"
                                    autocomplete="reg_no">
                            </div>

                            <div class="form-group">
                                <label>Current Job Location</label>
                                <input type="text" name="current_job_location" class="form-control"
                                    placeholder="Ex: Hight-Tech Hospital" value="{{ $doctor->current_job_location }}"
                                    autocomplete="current_job_location">
                            </div>

                            <div class="form-group">
                                <label>Diseases</label>
                                <select class="select2" multiple="multiple" data-placeholder="Select At Least 5 Disease"
                                    style="width: 100%;" name="disease_id[]">
                                    {{-- @foreach ($diseases as $disease)
                                        <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                                    @endforeach

                                    @php
                                        $values = explode(',', $doctor->disease_id);
                                    @endphp
                                    @foreach ($diseases as $disease)
                                        @if (in_array("$disease->id", $values))
                                        <option value="{{ $disease->id }}" selected>{{ $disease->name }}</option>
                                        @endif
                                    @endforeach --}}

                                    @php
                                        $values = json_decode($doctor->disease_id);
                                    @endphp


                                    @foreach ($diseases as $disease)
                                        @foreach ($values as $value)
                                            @if ($disease->id == $value)
                                                <option value="{{ $disease->id }}" selected>{{ $disease->name }}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Doctor's Category</label>
                                <select class="select2 form-control" style="width: 100%;"
                                    data-placeholder="Select At Least 5 Disease" name="doctor_category_id">
                                    @foreach ($doctorCategories as $doctorCategory)
                                        <option value="{{ $doctorCategory->id }}"
                                            {{ $doctor->doctor_category_id == $doctorCategory->id ? 'selected' : '' }}>
                                            {{ $doctorCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Doctor Image</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="elevation-3" id="prevImg"
                                            src="{{ asset('uploads/doctor/' . $doctor->image) }}" width="150px" />
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" id="inputFoto" name="image" accept="image/*"
                                            class="form-control" placeholder="Upload Image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="status">
                                <label class="form-check-label">Status</label>
                            </div>
                        </div>
                        <div class="row py-2 px-4">
                            <div class="col-12">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                                {{-- <input type="submit" value="Save" class="btn btn-success float-right"> --}}
                                <button type="submit" class="btn btn-success float-right">Submit</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->

@endsection


@section('script_footer')
    <script src="{{ asset('/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <script>
        inputFoto.onchange = evt => {
            const [file] = inputFoto.files
            if (file) {
                prevImg.src = URL.createObjectURL(file)
            }
        }

        $('.select2').select2()
    </script>
@endsection
