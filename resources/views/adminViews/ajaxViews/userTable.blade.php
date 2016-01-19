<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact Number</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $usr)
        <tr>
            <td>{{$usr->ID}}</td>
            <td>{{$usr->Name}}</td>
            <td>{{$usr->ContactNo}}</td>
        </tr>
    @endforeach
    </tbody>
</table>