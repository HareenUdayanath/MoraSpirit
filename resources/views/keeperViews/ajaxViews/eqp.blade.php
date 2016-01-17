

<select class="form-control" id="eqselect">

        @foreach($equipments as $equipment)
            <option>{{$equipment->Type}}</option>
        @endforeach


</select>