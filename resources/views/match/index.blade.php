@extends('match.searchbar')

@section('result')


    @if($data!='initial')
    <div class="container text-center">
        <h2><b>Search Results ({{$length}})</b></h2>

        <div class="row" style="margin-top: 50px;">

            @foreach($matches as $match)

                        <div class="col-md-3 col-md-offset-1 panel panel-info" style="height: 350px;">
                        <h4><b>{{$match->name}}</b></h4>
                <br>


                    <img src="{{$match->image}}" class="img-circle" alt="Cinque Terre" width="150" height="150">
                <br>
                    <h4>{{$match->city}}</h4>

                <br>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$match->id}}">View</button>

            </div>
                <!-- Modal -->
                <div id="{{$match->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">{{$match->name}}</h2>
                            </div>
                            <div class="modal-body">
                                <img src="{{$match->image}}" class="img-circle" alt="Cinque Terre" width="250" height="250">
                                <div class="table-responsive">
                                    <br>
                                    <table class="table">
                                        <tr>
                                            <td class="active"><b>Gender</b></td>
                                            <td>{{$match->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><b>DOB</b></td>
                                            <td>{{$match->dob}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><b>State</b></td>
                                            <td>{{$match->state}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><b>City</b></td>
                                            <td>{{$match->city}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><b>Mobile</b></td>
                                            <td>{{$match->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><b>Religion</b></td>
                                            <td>{{$match->religion}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><b>Marital Status</b></td>
                                            <td>{{$match->marital_status}}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>

    @endif
@endsection