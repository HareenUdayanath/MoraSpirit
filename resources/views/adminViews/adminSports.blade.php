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
                <a href={{route('adminSports')}}><i class="fa fa-soccer-ball-o"></i> Sports </a>
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
    <h3>Sports</h3>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="view-tab" role="tab" data-toggle="tab" aria-expanded="true">View Sports</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="new-tab" data-toggle="tab"  aria-expanded="false">Add New Sport</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="edit-tab" data-toggle="tab"  aria-expanded="false">Edit Sport</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="view-tab">
                <section class="content">
                    <div class="row">
                        <label class=" col-md-1 col-sm-1 col-xs-1" style="padding-top: 5px;"> Search: </label>
                        <div class="col-md-6 col-sm-6 col-xs-6 top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter a sport name...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                            </div>
                        </div>
                        <br />
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <ul class="list-group" id="sport-list">
                                    <li class="list-group-item ">Cricket</li>
                                    <li class="list-group-item ">Football</li>
                                    <li class="list-group-item ">Vollyball</li>
                                </ul>
                                <script type='text/javascript'>
                                    $('.list-group li').click(function(e) {
                                        e.preventDefault()
                                        $that = $(this);
                                        $('.list-group').find('li').removeClass('active');
                                        $that.addClass('active');
                                        document.getElementById('selected-sport').value=$(this).text();
                                        var sport = $(this).text();
                                        $.ajax({
                                            url:'{{url('adminLoadUtils')}}/'+sport,
                                            success:function(data){
                                                if(data!=1){
                                                    $('#util-tbl').html(data).show();
                                                }
                                            }
                                        });
                                    });
                                </script>
                            </div>
                            <input hidden id="selected-sport" value="">
                            <div class="col-md-6 col-sm-6 col-xs-6" id="util-tbl">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Resource</th>
                                            <th>Utilization</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary pull-right" type="button" onclick="">Edit Sport</button>
                    </div>
                    <br />
                    <br />
                </section>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="new-tab">
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
                                        <input type="hidden" name="num-of-rows" id="num-of-rows" value="0">
                                    </div>
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
                                                <tr id="addr0">
                                                    <td>
                                                        <select class="form-control" name="resource0" required>
                                                            <option hidden value=""> Choose a Resource... </option>
                                                            @foreach($resources as $res)
                                                                <option>{{$res->Name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input  name="util0" type="text" placeholder="Utilization"  class="form-control input-md" required></td>
                                                </tr>
                                                <tr id="addr1"></tr>
                                                </tbody>
                                            </table>
                                            <a id="add_row" class="btn btn-default pull-left">Add Resource</a><a id='delete_row' class="pull-right btn btn-default">Remove Resource</a>
                                            <script>
                                                $(document).ready(function(){
                                                    var i=1;
                                                    $("#add_row").click(function(){
                                                        $('#addr'+i).html("<td><select class='form-control' required name='resource"+i+"'> <option hidden value=''> Choose a Resource... </option> @foreach($resources as $res)<option>{{$res->Name}}</option> @endforeach </select></td><td><input  name='util"+i+"' type='text' placeholder='Utilization'  class='form-control input-md' required></td>");

                                                        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
                                                        i++;
                                                        document.getElementById("num-of-rows").value = i;
                                                    });
                                                    $("#delete_row").click(function(){
                                                        if(i>0){
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
                                            <button type="reset" class="btn btn-primary pull-right">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="edit-tab">
                <p align="center"> Select a sport in View tab to Edit here</p>
            </div>
        </div>
    </div>
@endsection
