<table id="example1" class="table table-bordered">
    <thead>
    <tr>
        <th> Item No. </th>
        <th> Type </th>
        <th> Condition </th>
        <th> Availabilty </th>
    </tr>
    </thead>
    <tbody>
    @foreach($equips as $equip)
        <tr class="clickable-row">
            <td>{{$equip->ItemNo}}</td>
            <td>{{$equip->Type}}</td>
            <td>{{$equip->Condition}}</td>
            @if($equip->Availability=="1")
                <td>Available</td>
            @else
                <td>Not Available</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
<script type='text/javascript'>
    $('#example1').on('click', '.clickable-row', function(event) {
        $(this).addClass('bg-info').siblings().removeClass('bg-info');
    });
</script>