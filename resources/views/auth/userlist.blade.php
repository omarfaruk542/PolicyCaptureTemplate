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
                        <li class="breadcrumb-item active">User List</li>
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
                            <h5 class="m-0 float-left">User List</h5>
                            <a type="button" href="{{ route('company.create') }}"
                                class="btn btn-sm btn-primary float-right">Add New User
                                <span class="badge badge-light ml-1">{{ $totalUser }}</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 overflow-auto">
                                        <table id="example1"
                                            class="display table table-bordered table-striped dataTable dtr-inline responsive"
                                            role="grid" aria-describedby="example1_info" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr role="row">
                                                    <th class="thead"><input type="checkbox" id="selectbox"
                                                            class="select-checkbox"></th>
                                                    <!--<th>Id</th>-->
                                                    <th>Name</th>
                                                    <th>Email Address</th>
                                                    <th>Contact Number</th>
                                                    <th>Company</th>
                                                    <th>Status</th>
                                                    <th>Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $id = 1;
                                                @endphp
                                                @foreach ($users as $user)
                                                    <tr>
                                                        {{-- <td>{{ $id }}</td> --}}
                                                        <td></td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->number }}</td>
                                                        <td>{{ $user['projectInfo'] ? $user['projectInfo']->name : null }}</td>
                                                        <td class="text-center">
                                                            <h5><span
                                                                class="badge {{ $user->is_active ? 'badge-secondary' : 'badge-danger' }} px-2" style="font-size: 12px;">
                                                                {{ $user->is_active ? 'Active' : 'Inactive' }}</span></h5>
                                                        </td>
                                                        <td class="text-center">
                                                            <span
                                                                class="badge {{ $user->for_client ? 'badge-success' : 'badge-primary' }} px-2" style="font-size: 12px;">
                                                                {{ $user->for_client ? 'Client' : 'Admin' }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="#" class="btn btn-sm btn-warning mr-1"><i
                                                                    class="fas fa-pencil-alt mr-1"></i> Edit</a>
                                                            <a href="#" class="btn btn-sm btn-danger"><i
                                                                    class="fas fa-trash-alt mr-1"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $id++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                            {{-- <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Rendering engine</th>
                                                </tr>
                                            </tfoot> --}}
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
