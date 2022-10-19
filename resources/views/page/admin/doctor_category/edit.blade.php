@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Disease Add')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Doctor Catogory Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Doctor Category Edit</li>
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

        <form method="post" enctype="multipart/form-data" action="{{ route('admin.doctor.category.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Enter Doctor Category Infromation Information</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Doctor Category Name" value="{{ $doctorCategory->name }}">
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="status" {{ $doctorCategory->status == 0 ? '':'checked' }}>
                                <label class="form-check-label">Status</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                        {{-- <input type="submit" value="Save" class="btn btn-success float-right"> --}}
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </div>
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
