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
    @foreach($reservedList as $item)
        <tr class="even pointer">

            @if(intval(explode(":",$item->getStartTime())[0])>12 and intval(explode(":",$item->getEndTime())[0])>12)
                <th class="column-title">{{strval(intval(explode(":",$item->getStartTime())[0])-12).":".explode(":",$item->getStartTime())[1]}} pm</th>
                <th class="column-title">{{strval(intval(explode(":",$item->getEndTime())[0])-12).":".explode(":",$item->getEndTime())[1]}} pm</th>

            @elseif(intval(explode(":",$item->getStartTime())[0])<12 and intval(explode(":",$item->getEndTime())[0])<12)
                <th class="column-title">{{strval(intval(explode(":",$item->getStartTime())[0])).":".explode(":",$item->getStartTime())[1]}} am</th>
                <th class="column-title">{{strval(intval(explode(":",$item->getEndTime())[0])).":".explode(":",$item->getEndTime())[1]}} am</th>

            @elseif(intval(explode(":",$item->getEndTime())[0])>12 and intval(explode(":",$item->getStartTime())[0])<12)
                <th class="column-title">{{strval(intval(explode(":",$item->getStartTime())[0])).":".explode(":",$item->getStartTime())[1]}} am</th>
                <th class="column-title">{{strval(intval(explode(":",$item->getEndTime())[0])-12).":".explode(":",$item->getEndTime())[1]}} pm</th>

            @elseif(intval(explode(":",$item->getEndTime())[0])<12 and intval(explode(":",$item->getStartTime())[0])>12)
                <th class="column-title">{{strval(intval(explode(":",$item->getStartTime())[0])-12).":".explode(":",$item->getStartTime())[1]}} pm</th>
                <th class="column-title">{{strval(intval(explode(":",$item->getEndTime())[0])).":".explode(":",$item->getEndTime())[1]}} am</th>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>