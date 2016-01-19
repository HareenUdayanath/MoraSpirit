
<select class="form-control" id="breqselect">

    @foreach($borrows as $borrow)
        <option>{{$borrow->ItemNo}}</option>
    @endforeach


</select>