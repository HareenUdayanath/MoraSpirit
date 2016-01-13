@extends('layout.template')


@section('siderBar')
    <div class="menu_section">
        <h3>Admin</h3>
        <ul class="nav side-menu">
            <li>
                <a href={{route('adminHome')}}><i class="fa fa-home"></i> Home <!--span class="fa fa-chevron-down"></--span--></a>
            </li>
            <li>
                <a> <i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span> </a>
                <ul class="nav child_menu" style="display: none">
                    <li> <a href={{route('adminUsers')}}> Manage Users </a> </li>
                    <li> <a href={{route('adminAddUser')}}> Add New User </a> </li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-soccer-ball-o"></i>Sports <span class="fa fa-chevron-down"></span> </a>
                <ul class="nav child_menu" style="display: none">
                    <li> <a href={{route('adminSports')}}> Manage Sports </a> </li>
                    <li> <a href=#> Add New Sport </a> </li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-cubes"></i>Sport Equipments <span class="fa fa-chevron-down"></span> </a>
                <ul class="nav child_menu" style="display: none">
                    <li> <a> Manage Sports Equipments </a> </li>
                    <li> <a href=#> Add New Equipment </a> </li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-building-o"></i>Resources <span class="fa fa-chevron-down"></span> </a>
                <ul class="nav child_menu" style="display: none">
                    <li> <a href={{route('adminResources')}}> Manage Resources </a> </li>
                    <li> <a href=#> Add New Resource </a> </li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-child"></i>Students <span class="fa fa-chevron-down"></span> </a>
                <ul class="nav child_menu" style="display: none">
                    <li> <a href={{route('adminStudents')}}> Manage Students </a> </li>
                    <li> <a href=#> Add New Student </a> </li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <h1>Admin Equipments</h1>
@endsection