@extends('layout.template')

@section('imports')

@endsection

@section('siderBar')
    <div class="menu_section">
        <h3>Keeper</h3>
        <ul class="nav side-menu">
            <li><a href={{route('keeperHome')}}><i class="fa fa-home"></i> Home </a> </li>
            <li><a href={{route('res_res')}}><i class="fa fa-edit"></i> Reserve </a>
            </li>
            <li><a href={{route('eqplending')}}><i class="fa fa-desktop"></i> Equipment Lending </a>
            </li>
            <li><a href={{route('eqprecieval')}}><i class="fa fa-table"></i> Equipment Recieval </a>
            </li>

        </ul>
    </div>
@endsection


@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Update Details</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
        <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Equipment ID<span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" id="updateEqpID" required="required" class="form-control col-md-4 col-xs-12">
                    </div>

                        <button type="button" class="btn btn-round btn-primary" onclick="updateEqp()">Search</button>

                </div>

                <script type="text/javascript">
                    function check(){

                    }

                </script>

                <div class="col-md-9 col-sm-6 col-xs-12">
                <div class="panel panel-primary" id ="updatePanel" >

                </div>
                    </div>

                <script type = "text/javascript">
                    function updateEqp(){
                        var eqpID = document.getElementById('updateEqpID').value;
                        alert(eqpID);
                        $.ajax({
                            url:'{{url('getUpEqp')}}/'+ eqpID,
                            success: function(data){
                                if (data ==1){

                                }
                                else{
                                    alert(data);
                                    $('#updatePanel').html(data).show();
                                }

                            }
                        })
                    }

                    function sendData(){

                        var eqpID = document.getElementById('updateEqpID').value;
                        var Availability = document.getElementById("availability");
                        var eqpAvText = Availability.options[Availability.selectedIndex].text;
                        var condition = document.getElementById("condition");
                        var eqpCon = condition.options[condition.selectedIndex].text;
                        if(eqpAvText=="Available"){
                            var eqpAv=1;
                        }
                        else{
                            var eqpAv=0;
                        }
                       $.ajax({
                           // alert(eqpID,eqpAv,eqpCon);
                            url:'{{url('upDetails')}}/'+ eqpID +'/'+ eqpAv +'/'+ eqpCon,
                            success: function(data){
                                if (data ==1){

                                }
                                else{
                                    alert("Equipment details were updated successfully!");
                                    //$('#updatePanel').html(data).show();
                                }

                            }
                        })
                    }
                    </script>


    </form>
    </div>
    </div>
@endsection