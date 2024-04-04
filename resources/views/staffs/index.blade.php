@extends('layouts.app')
@section('content')
    <div class="main-wrapper">     
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mt-5">
                                <h4 class="card-title float-left mt-2">All Staff</h4>
                                <a href="{{ url('/staff/create') }}" class="btn btn-primary float-right veiwbutton">Add Staff</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form>
                            <div class="row formtype">
                                <!-- Your existing search form goes here -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body booking_card">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                            	<th>Profile</th>
                                                <th>Name</th>
										        <th>Designation</th>
										        <th>Address</th>
										        <th>Mobile</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($staffs as $staff)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="profile.html" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-03.jpg" alt="User Image">
                                                            </a>
                                                            <a href="profile.html">{{ $staff->name }} <span>#{{ $staff->staff_id }}</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ $staff->name }}</td>
										            <td>{{ $staff->designation }}</td>
										            <td>{{ $staff->address }}</td>
										            <td>{{ $staff->mobile }}</td>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                            	<a class="dropdown-item" href="{{ url('/staff/' . $staff->id . '/edit') }}"><i class="fas fa-pen m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="{{ url('/staff/' . $staff->id) }}"><i class="fas fa-eye m-r-5"></i> View</a>
                                                                <form method="POST" action="{{ url('/staff' . '/' . $staff->id) }}" accept-charset="UTF-8" style="display:inline">
					                                                {{ method_field('DELETE') }}
					                                                {{ csrf_field() }}
					                                                <button type="submit" class="dropdown-item" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash m-r-5" aria-hidden="true"></i> Delete</button>
					                                           </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
