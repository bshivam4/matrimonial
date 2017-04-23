@extends('layouts.adminMenu')

@section('content')
    <div class="container">


            <div class="panel panel-info">
                <div class="panel-heading"><h4>Find Match</h4> </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="/find">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="lookingfor">Looking For:</label>
                            <div class="col-sm-10 col-md-5">
                                <label class="radio-inline "><input type="radio" name="gender" value="Male">Groom</label>
                                <label class="radio-inline "><input type="radio" name="gender" value="Female">Bride</label>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="dob">In which State?</label>
                            <div class="col-sm-10 col-md-3">
                                <select name="state" class="form-control">
                                    <option selected disabled>Select State</option>
                                    @foreach($states['Data'] as $state)
                                        <option value="{{$state['Name']}}">{{$state['Name']}} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="dob">Of which Religion ?</label>
                            <div class="col-sm-10 col-md-3">
                                <select name="religion" class="form-control">
                                    <option selected disabled>Select Religion</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Sikh">Sikh</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Buddhist">Buddhist</option>
                                </select>
                                @if ($errors->has('religion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-lg">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


    </div>


    @yield('result')


@endsection