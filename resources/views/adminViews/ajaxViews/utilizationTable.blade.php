<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Resource</th>
            <th>Utilization</th>
        </tr>
        </thead>
        <tbody>
        @foreach($utils as $util)
            <tr>
                <td>{{$util->Name}}</td>
                <td>{{$util->Utilization}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>