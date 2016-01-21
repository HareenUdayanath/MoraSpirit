

<select class="form-control" id="eqnums" name="eqnums">

    @foreach($equipmentnums as $equipment)
        <option>{{$equipment->ItemNo}}</option>
    @endforeach
</select>
