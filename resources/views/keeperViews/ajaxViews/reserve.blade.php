

<select class="form-control" id="eqnums">

    @foreach($equipmentnums as $equipment)
        <option>{{$equipment->ItemNo}}</option>
    @endforeach
</select>
