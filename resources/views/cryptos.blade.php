<option value="" label="Choose one"></option>
@foreach($cryptos as $crypto)
    <option value="{{$crypto->symbol}}">{{$crypto->name.' - '.$crypto->symbol}}</option>
@endforeach