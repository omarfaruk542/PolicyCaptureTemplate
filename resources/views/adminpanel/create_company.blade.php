@extends('adminpanel.dashboard')
@section('dashboard')
    <div class="content-header">
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
                            <a type="button" href="{{ route('company.index') }}" class="btn btn-sm btn-primary float-right">View Project List
                                <span class="badge badge-light ml-1">4</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('company.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="name">Project Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter project name" name="project_name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="address">Project Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter project address" name="project_address">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="projectPODateInput">Work Order Date</label>
                                    <input type="date" class="form-control" id="projectPODateInput" placeholder="Enter project address" name="po_date">
                                  </div>
                                  <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="projectActive" checked="true" name="is_active">
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
