@extends('layout.public')


@section('content')
    <h1>Available Equipments</h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Item ID</th>
            <th>Sport Name</th>
            <th>Type</th>

        </tr>
        </thead>
        <tbody>
        @foreach($equipments as $equipment)
            <tr>
                <td>{{$equipment->ItemNo}}</td>
                <td>{{$equipment->SportName}}</td>
                <td>{{$equipment->Type}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('requiredJS')
@endsection