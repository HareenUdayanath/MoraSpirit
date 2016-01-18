<table id="example1" class="table table-bordered table-striped">
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
        <tr>
            <td>{{$equip->ItemNo}}</td>
            <td>{{$equip->EquipType}}</td>
            <td>{{$equip->Condition}}</td>
            <td>{{$equip->Availability}}</td>
        </tr>
    @endforeach
    </tbody>
</table>