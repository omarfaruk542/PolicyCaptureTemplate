@extends('adminpanel.dashboard')
@section('dashboard')
    <div class="content-header">
        <!-- Notification -->
        @if (session('status'))
            <div class="toast message" style="position: absolute; top: 60px; right: 0; z-index: 1070; width:300px;"
                data-delay="5000">
                <div class="toast-header bg-success">
                    <strong class="mr-auto">Success</strong>
                    <small>Just Now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <div>
                        <i class="fas fa-check-square mr-2 text-success"></i>
                        <span>{{ session('status') }}</span>

                    </div>
                </div>
            </div>
        @endif
        <!-- Notification -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">CSL Software Resources Ltd.</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Project List</a></li>
                        <li class="breadcrumb-item active">Add New Project</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0 float-left">Create a New Project</h5>
                            <a type="button" href="{{ route('company.index') }}"
                                class="btn btn-sm btn-primary float-right">View Project List
                                <span class="badge badge-light ml-1">{{ $totalProjects }}</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('company.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="project_name">Project Name</label>
                                        <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                                            id="project_name" placeholder="Enter project name" name="project_name"
                                            value="{{ old('project_name') }}">
                                        @error('project_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="project_address">Project Address</label>
                                        <input type="text"
                                            class="form-control @error('project_address') is-invalid @enderror"
                                            id="project_address" placeholder="Enter project address" name="project_address"
                                            value="{{ old('project_address') }}">
                                        @error('project_address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="po_date">Work Order Date</label>
                                        <input type="date" class="form-control @error('po_date') is-invalid @enderror"
                                            id="po_date" placeholder="Enter work order date" name="po_date"
                                            value="{{ old('po_date') }}">
                                        @error('po_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="projectActive"
                                                checked="true" name="is_active">
                                            <label for="projectActive" class="custom-control-label">Is Active</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Save Project</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
