@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Disease Add')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Disease Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Disease Add</li>
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

        <form method="post" enctype="multipart/form-data" action="{{ route('admin.disease.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Enter Disease Information</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Disease Name"
                                    value="{{ old('name') }}" autocomplete="name">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" placeholder="Description"
                                    value="{{ old('description') }}" autocomplete="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Disease Image</label>
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

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="status">
                                <label class="form-check-label">Status</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">বাংলায় রোগের নাম লিখুন</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>নাম</label>
                                <input type="text" name="name_bn" class="form-control" placeholder="Disease Name"
                                    value="{{ old('name_bn') }}" autocomplete="name_bn">
                            </div>

                            <div class="form-group">
                                <label>বিবরণ</label>
                                <textarea type="text" name="description_bn" class="form-control" placeholder="Description"
                                    value="{{ old('description_bn') }}" autocomplete="description_bn"></textarea>
                            </div>

                            {{-- <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="status">
                                <label class="form-check-label">Status</label>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                    {{-- <input type="submit" value="Save" class="btn btn-success float-right"> --}}
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->

@endsection


@section('script_footer')
    <script>
        inputFoto.onchange = evt => {
            const [file] = inputFoto.files
            if (file) {
                prevImg.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
