<table id="example1" class="table table-bordered">
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
        <tr class="clickable-row">
            <td>{{$std->ID}}</td>
            <td>{{$std->FirstName}}</td>
            <td>{{$std->Department}}</td>
            <td>{{$std->Faculty}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<script type='text/javascript'>
    $('#example1').on('click', '.clickable-row', function(event) {
        $(this).addClass('bg-info').siblings().removeClass('bg-info');
        document.getElementById("selected-index").value = $(this).find('td:first').text();
    });
</script>