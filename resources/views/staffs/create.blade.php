@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Staff</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ url('staff') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input class="form-control" type="text" name="designation">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" type="text" name="mobile">
                                </div>
                            </div>
                            <!-- Add more fields as needed -->
                        </div>
                        <button type="submit" class="btn btn-primary buttonedit ml-2">Add Staff</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
