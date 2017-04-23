@extends('layouts.adminMenu')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            @if($message=="success")
                <div class="alert alert-success">
                    <strong>Success!</strong> Added User Successfully .
                </div>
            @endif
                <div class="panel-heading"><h4>Add New User</h4></div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="/addindividual" enctype='multipart/form-data' role="form">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="email">Name:</label>
                        <div class="col-sm-10 col-md-3">
                            <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="email">Gender:</label>
                        <div class="col-sm-10 col-md-5">
                            <label class="radio-inline "><input type="radio" name="gender" value="Male">Male</label>
                            <label class="radio-inline "><input type="radio" name="gender" value="Female">Female</label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="dob">Date Of Birth:</label>
                        <div class="col-sm-10 col-md-3">
                            <input value="{{ old('dob') }}" type="date" class="form-control" id="dob" name="dob" placeholder="Enter DOB">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="dob">State:</label>
                        <div class="col-sm-10 col-md-3">
                            <select name="state" class="form-control" onchange="getCity(this.value)">
                                <option selected disabled>Select State</option>
                                @foreach($states['Data'] as $state)
                                    <option value="{{$state['ID']}}">{{$state['Name']}} </option>
                                @endforeach
                            </select>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="dob">City:</label>
                        <div class="col-sm-10 col-md-3">
                            <select id="city" name="city" class="form-control">
                                <option selected disabled>Select City</option>
                            </select>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="email">Mobile:</label>
                        <div class="col-sm-10 col-md-3">
                            <input value="{{ old('mobile') }}" type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="dob">Religion:</label>
                        <div class="col-sm-10 col-md-3">
                            <select name="religion" class="form-control">
                                <option selected disabled>Select Religion</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Sikh">Sikh</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Christian">Christian</option>
                                <option value="Buddhist">Buddhist</option>
                            </select>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="dob">Marital Status:</label>
                        <div class="col-sm-10 col-md-3">
                            <select name="marital_status" class="form-control">
                                <option selected disabled>Select Marital Status</option>
                                <option value="Never Married">Never Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widow">Widow</option>
                            </select>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('marital_status') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('mother_tongue') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="dob">Mother Tongue:</label>
                        <div class="col-sm-10 col-md-3">
                            <select name="mother_tongue" class="form-control">
                                <option selected disabled>Select Mother Tongue</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Bengali">Bengali</option>
                                <option value="Marathi">Marathi</option>
                                <option value="Punjabi">Punjabi</option>
                                <option value="Sindhi">Sindhi</option>

                            </select>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mother_tongue') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="dob">Profile Picture (optional)</label>
                        <div class="col-sm-10 col-md-3">
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}">

                        @if ($errors->has('image'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success btn-lg">Add User</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

