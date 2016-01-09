@extends('layout.template')


@section('siderBar')
    <div class="menu_section">
        <h3>Admin</h3>
        <ul class="nav side-menu">
            <li>
                <a href={{route('adminHome')}}><i class="fa fa-home"></i> Home <!--span class="fa fa-chevron-down"></--span--></a>
            </li>
            <li>
                <a href={{route('adminUsers')}}><i class="fa fa-users"></i>Users</a>
            </li>
            <li>
                <a href={{route('adminSports')}}><i class="fa fa-soccer-ball-o"></i>Sports</a>
            </li>
            <li>
                <a href={{route('adminEquipments')}}><i class="fa fa-cubes"></i>Sport Equipments</a>
            </li>
            <li>
                <a href=#><i class="fa fa-building-o"></i>Resources</a>
            </li>
            <li>
                <a href={{route('adminStudents')}}><i class="fa fa-child"></i>Students</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <h1>Admin Resources</h1>
@endsection