<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th> Student ID </th>
        <th> Name </th>
        <th> Department </th>
        <th> Faculty</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $std)
        <tr>
            <td>{{$std->ID}}</td>
            <td>{{$std->FirstName}}</td>
            <td>{{$std->Department}}</td>
            <td>{{$std->Faculty}}</td>
        </tr>
    @endforeach
    </tbody>
</table>