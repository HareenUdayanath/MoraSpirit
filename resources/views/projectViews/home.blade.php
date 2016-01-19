@extends('layout.template')


@section('siderBar')
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href={{url('home')}}>Home</a>

                    </li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <h1>WelCome </h1>
    <img src={{asset("/images/Other/moraspirit_logo.png")}} alt="...">
@endsection