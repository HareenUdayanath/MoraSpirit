@extends('layout.public')


@section('content')
    <h1>Resources</h1></br></br>
    <div class="table-responsive">
    <table class="table table-bordered" id = "resourceTable">
        <thead>
        <tr>
            <th>Resource ID</th>
            <th>Resource Name</th>
            <th>Location</th>

        </tr>
        </thead>
        <tbody>
        @foreach($resources as $resource)
            <tr class="clickable-row">
                <td>{{$resource->ID}}</td>
                <td>{{$resource->Name}}</td>
                <td>{{$resource->Location}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script type = "text/javascript">
        $('#resourceTable').on('click','.clickable-row',function(event){
            $(this).addClass('bg-info').siblings().removeClass('bg-info');
            var loc = '{{url('publicResDates')}}/'+$(this).find('td:first').text();
            document.getElementById('selected-res').value = loc;
        });
    </script>
    </div>
    <input hidden id="selected-res" value="">
    <button type="button" class="btn btn-primary pull-right" onclick="location.href=document.getElementById('selected-res').value">View avilable timeslots</button>
@endsection

@section('requiredJS')
@endsection