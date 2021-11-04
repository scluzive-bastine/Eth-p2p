
<option value="" label="Choose one"></option>
@foreach(config('currencies') as $key=>$name)
    <option value="{{$key}}">{{$key}}</option>
@endforeach