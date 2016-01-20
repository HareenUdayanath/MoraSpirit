@extends('layout.public')


@section('content')
    <h1>Practice Schedules</h1></br></br>
    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>Session ID</th>
                <th>Sport Name</th>
                <th>Resource Name</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($practiceSchedules as $practiceSchedule)
                <tr>
                    <td>{{$practiceSchedule->SessionID}}</td>
                    <td>{{$practiceSchedule->SportName}}</td>
                    <td>{{$practiceSchedule->Name}}</td>
                    <td>{{$practiceSchedule->Date}}</td>
                    <td>{{$practiceSchedule->StartTime}}</td>
                    <td>{{$practiceSchedule->EndTime}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('requiredJS')
@endsection