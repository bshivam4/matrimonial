    <option selected disabled>Select City</option>
    @foreach($cities['Data'] as $city)
        <option value="{{$city['city']}}">{{$city['city']}} </option>
    @endforeach
