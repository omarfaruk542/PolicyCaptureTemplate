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
                        <li class="breadcrumb-item active">Project List</li>
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
                            <h5 class="m-0 float-left">Project List</h5>
                            <a type="button" href="{{ route('company.create') }}" class="btn btn-sm btn-primary float-right">Add New Project
                                <span class="badge badge-light ml-1">4</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                               <thead class="text-center">
                                   <tr>
                                       <th scope="col">SL</th>
                                       <th scope="col">Project Name</th>
                                       <th scope="col">Address</th>
                                       <th scope="col">Work Order Date</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td>1</td>
                                       <td>CSL Software Resources Ltd.</td>
                                       <td>House # 53, Road # 07, Sector # 07, Uttara Model Town, Dhaka-1230</td>
                                       <td>{{ date_format(date_create("01-01-1997"),"m/d/Y") }}</td>
                                       <td><span class="badge badge-success">Active</span></td>
                                       <td>
                                            <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-file-invoice mr-1"></i>View</a>
                                           <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt mr-1"></i>Edit</a>
                                           <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i>Delete</a>
                                       </td>
                                   </tr>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
