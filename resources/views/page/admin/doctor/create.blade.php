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
                    <h1>Doctor Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Doctor Add</li>
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

        <form method="post" enctype="multipart/form-data" action="{{ route('admin.doctor.store') }}">
            @csrf
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
                                    value="{{ old('name') }}" autocomplete="name">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address"
                                    value="{{ old('email') }}" autocomplete="email">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"
                                    value="{{ old('phone') }}" autocomplete="phone">
                            </div>

                            <div class="form-group">
                                <label>Reg No</label>
                                <input type="text" name="reg_no" class="form-control"
                                    placeholder="Enter Registration Number" value="{{ old('reg_no') }}" autocomplete="reg_no">
                            </div>

                            <div class="form-group">
                                <label>Current Job Location</label>
                                <input type="text" name="current_job_location" class="form-control"
                                    placeholder="Ex: Hight-Tech Hospital" value="{{ old('current_job_location') }}" autocomplete="current_job_location">
                            </div>

                            <div class="form-group">
                                <label>Diseases</label>
                                <select class="select2" multiple="multiple" data-placeholder="Select At Least 5 Disease"
                                    style="width: 100%;" name="disease_id[]">
                                    @foreach ($diseases as $disease)
                                        <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Doctor's Category</label>
                                <select class="select2 form-control" style="width: 100%;"
                                    data-placeholder="Select At Least 5 Disease" name="doctor_category_id">
                                    @foreach ($doctorCategories as $doctorCategory)
                                        <option value="{{ $doctorCategory->id }}">{{ $doctorCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Doctor Image</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="elevation-3" id="prevImg"
                                            src="{{ asset('vendor/adminlte3/img/user2-160x160.jpg') }}" width="150px" />
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" id="inputFoto" name="image" accept="image/*"
                                            class="form-control" placeholder="Upload Image">
                                    </div>
                                </div>
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
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ডাক্তার এর তথ্য</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>নাম</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Doctor Name"
                                    value="{{ old('name') }}" autocomplete="name">
                            </div>

                            <div class="form-group">
                                <label>মোবাইল নাম্বার</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"
                                    value="{{ old('phone') }}" autocomplete="phone">
                            </div>

                            <div class="form-group">
                                <label>রেজিস্ট্রেশান নাম্বার</label>
                                <input type="text" name="reg_no" class="form-control"
                                    placeholder="Enter Registration Number" value="{{ old('reg_no') }}" autocomplete="reg_no">
                            </div>

                            <div class="form-group">
                                <label>বর্তমান চাকরির স্থান</label>
                                <input type="text" name="current_job_location" class="form-control"
                                    placeholder="Ex: Hight-Tech Hospital" value="{{ old('current_job_location') }}" autocomplete="current_job_location">
                            </div>

                            <div class="form-group">
                                <label>রোগের নাম</label>
                                <select class="select2" multiple="multiple" data-placeholder="Select At Least 5 Disease"
                                    style="width: 100%;" name="disease_id[]">
                                    @foreach ($diseases as $disease)
                                        <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>ডাক্তার ক্যাটেগরি</label>
                                <select class="select2 form-control" style="width: 100%;"
                                    data-placeholder="Select At Least 5 Disease" name="doctor_category_id">
                                    @foreach ($doctorCategories as $doctorCategory)
                                        <option value="{{ $doctorCategory->id }}">{{ $doctorCategory->name }}</option>
                                    @endforeach
                                </select>
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
