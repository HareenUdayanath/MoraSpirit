@extends('layout.public')


@section('content')
    <select data-parsley-id="0415" id="heard" class="form-control" required="" onchange="showSlots({{$resourceName}})">
        <option hidden value="">Choose a date..</option>
        @foreach($dates as $date)
            <option value="press">{{$date->Date}}</option>
        @endforeach
    </select>
    <script type="text/javascript">
        function showSlots(resourceName) {
            alert(resourceName);
            var sel_date = document.getElementById('heard');
            var selectDate = sel_date.options[sel_date.selectedIndex].text;
            alert(resourceName);
            $.ajax({
                url:'{{url('getReserveTime')}}/'+resourceName+'/'+selectDate,
                success:function(data){
                    if(data!=1){
                        alert(data);
                        $('#slotTable').html(data).show();
                    }
            }
            });
        }
    </script>
    <div id="slotTable">
    <table class="table table-striped responsive-utilities jambo_table bulk_action" id="reservedTable" name="resourceList">
        <thead>
        <tr class="headings">
            <th class="column-title">Start Time </th>
            <th class="column-title">End Time </th>
            <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>
@endsection

@section('requiredJS')
@endsection