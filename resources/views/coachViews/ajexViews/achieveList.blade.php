<table class="table table-striped responsive-utilities jambo_table bulk_action" id="achieveTable" name="achieveTable">
    <thead>
    <tr class="headings">
        <th class="column-title">Sport Name </th>
        <th class="column-title">Date </th>
        <th class="column-title">Place </th>
        <th class="column-title">Contest</th>
        <th class="column-title">Description</th>
        <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($achieve as $item)
        <tr class="even pointer">
            <th class="column-title">{{$item->SportName}} </th>
            <th class="column-title">{{$item->Date}}  </th>
            <th class="column-title">{{$item->Place}}  </th>
            <th class="column-title">{{$item->Contest}} </th>
            <th class="column-title">{{$item->Description}} </th>

        </tr>
    @endforeach
    </tbody>
</table>


