<table id="example1" class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact Number</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $usr)
        <tr class="clickable-row">
            <td>{{$usr->ID}}</td>
            <td>{{$usr->Name}}</td>
            <td>{{$usr->ContactNo}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<script type='text/javascript'>
    $('#example1').on('click', '.clickable-row', function(event) {
        $(this).addClass('bg-info').siblings().removeClass('bg-info');
    });
</script>