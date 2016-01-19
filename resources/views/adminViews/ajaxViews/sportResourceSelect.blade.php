<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-sport-or-res"> {{$role}} </label>
<div class="col-md-6 col-sm-6 col-xs-12">
    <select class="form-control" id="user-sport-or-res">
        <option hidden value=""> Select a {{$role}}... </option>
        @if($role=='Sport')
            @foreach($roleitem as $item)
                <option>{{$item->SportName}}</option>
            @endforeach
        @elseif($role=='Resource')
            @foreach($roleitem as $item)
                <option>{{$item->Name}}</option>
            @endforeach
        @endif
    </select>
</div>