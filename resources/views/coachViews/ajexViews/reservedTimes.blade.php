<table class="table table-striped responsive-utilities jambo_table bulk_action" id="reservedTable" name="reservedList">
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
                <th class="column-title">10:00 </th>
                <th class="column-title">12:00 </th>
            </tr>
        @endforeach
    </tbody>
</table>