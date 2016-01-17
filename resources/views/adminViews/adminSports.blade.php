@extends('layout.template')


@section('siderBar')
    <div class="menu_section">
        <h3>Admin</h3>
        <ul class="nav side-menu">
            <li>
                <a href={{route('adminHome')}}><i class="fa fa-home"></i> Home </a>
            </li>
            <li>
                <a href={{route('adminUsers')}}> <i class="fa fa-users"></i> Users </a>
            </li>
            <li>
                <a><i class="fa fa-soccer-ball-o"></i> Sports </a>
            </li>
            <li>
                <a href={{route('adminEquipments')}}><i class="fa fa-cubes"></i> Sport Equipments </a>
            </li>
            <li>
                <a href={{route('adminResources')}}><i class="fa fa-building-o"></i> Resources </a>
            </li>
            <li>
                <a href={{route('adminStudents')}}><i class="fa fa-child"></i> Students </a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <h3>Users</h3>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Manage Sports</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Add New Sport</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <section class="content">
                    <div class="row">
                        <label class=" col-md-1 col-sm-1 col-xs-1" style="padding-top: 5px;"> Search By: </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <select class="form-control">
                                <option> ID </option>
                                <option> Name </option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                    </tr>
                                    </thead>
                                    {{--<tbody>
                                    @foreach($users as $usr)
                                        <tr>
                                            <td>{{$usr->ID}}</td>
                                            <td>{{$usr->Name}}</td>
                                            <td>{{$usr->ContactNo}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>--}}
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <br />
                                <form class="form-horizontal form-label-left" action={{route('adminAddSport')}}>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sport-name"> Sport Name </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="sport-name" name="sport-name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <input type="hidden" name="num-of-rows" id="num-of-rows" value="1">
                                    </div>
                                    <script type="text/javascript">
                                        function prepare(){
                                            alert(document.getElementById("num-of-rows").value);
                                            var url = "{{url('adminAddSport')}}"+"/"+document.getElementById("num-of-rows").value;
                                            alert(url);
                                            return url;
                                        }
                                    </script>
                                    <br />
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <table class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                <tr >
                                                    <th class="text-center"> Resource </th>
                                                    <th class="text-center"> Utilization </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id='addr0'>
                                                    <td>
                                                        <input type="text" name='resource0' placeholder='Resource Name' class="form-control"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name='util0' placeholder='Utilization' class="form-control"/>
                                                    </td>
                                                </tr>
                                                <tr id='addr1'></tr>
                                                </tbody>
                                            </table>
                                            <a id="add_row" class="btn btn-default pull-left">Add Resource</a><a id='delete_row' class="pull-right btn btn-default">Remove Resource</a>
                                            <script>
                                                $(document).ready(function(){
                                                    var i=1;
                                                    $("#add_row").click(function(){
                                                        $('#addr'+i).html("<td><input  name='resource"+i+"' type='text' placeholder='Resource Name'  class='form-control input-md'></td><td><input  name='util"+i+"' type='text' placeholder='Utilization'  class='form-control input-md'></td>");

                                                        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
                                                        i++;
                                                        document.getElementById("num-of-rows").value = i;
                                                    });
                                                    $("#delete_row").click(function(){
                                                        if(i>1){
                                                            $("#addr"+(i-1)).html('');
                                                            i--;
                                                            document.getElementById("num-of-rows").value = i;
                                                        }
                                                    });

                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" class="btn btn-success pull-right">Add Sport</button>
                                            <button type="button" class="btn btn-primary pull-right">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
