@extends('layouts.app')

@section('content')
<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <label>Whoops!</label> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="card">
    <div class="card-header bg-primary text-white">Details</div>
        <div class="card-body">
            <form action="{{ route('tracings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Middle Name:</label>
                            <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label>Age:</label>
                            <input type="text" name="age" class="form-control" placeholder="Age">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Street:</label>
                            <input type="text" name="street" class="form-control" placeholder="Street">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>City:</label>
                            <input type="text" name="city" class="form-control" placeholder="City">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Province:</label>
                            <input type="text" name="province" class="form-control" placeholder="Province">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Course:</label>
                            <input type="text" name="course" class="form-control" placeholder="Course">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" name="stud_type">
                                        <option value="New">New</option>
                                        <option value="Old">Old</option>
                                        <option value="Transferee">Transferee</option>
                                    </select>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Purpose of Visit :</label><br>
                                <label><input type="checkbox" name="purpose[]" value="Submit school documents"> SUBMIT SCHOOL DOCUMENTS</label><br>
                                <label><input type="checkbox" name="purpose[]" value="Claim academic records"> CLAIM ACADEMIC RECORDS</label><br>
                                <label><input type="checkbox" name="purpose[]" value="Pay school fees"> PAY SCHOOL FEES</label><br>
                                <label><input type="checkbox" name="purpose[]" value="Enroll a particular degree program"> ENROLL A PARTICULAR DEGREE PROGRAM</label><br>
                                <label><input type="checkbox" name="purpose[]" value="Others"> OTHERS</label>
                            </div> 
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
</div>
@endsection