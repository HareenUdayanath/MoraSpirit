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
    <h3>Sport Equipments</h3>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Manage Equipments</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Add New Equipment</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <section class="content">
                    <div class="row">
                        <label class=" col-md-1 col-sm-1 col-xs-1" style="padding-top: 5px;"> Search By: </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <select class="form-control" id="search-type">
                                <option> Type </option>
                                <option> Item No. </option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for..." id="search-term">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="searchEquipment()">Go!</button>
                                    </span>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function searchEquipment(){
                                var keyword = document.getElementById('search-term').value;
                                if (keyword==''){
                                    alert('Please enter a key word');
                                }else{
                                    var searchType = document.getElementById('search-type');
                                    var selectedtype = searchType.options[searchType.selectedIndex].text;
                                    if (selectedtype=='Type'){
                                        $.ajax({
                                            url:'{{url('adminSearchEquipType')}}/'+keyword,
                                            success:function(data){
                                                if(data==1){}
                                                else{
                                                    $('#tblEquipments').html(data).show();
                                                }
                                            }
                                        });
                                    }else{
                                        $.ajax({
                                            url:'{{url('adminSearchEquipID')}}/'+keyword,
                                            success:function(data){
                                                if(data==1){}
                                                else{
                                                    $('#tblEquipments').html(data).show();
                                                }
                                            }
                                        });
                                    }
                                }
                            }
                        </script>
                        <div class="col-xs-12">
                            <div class="table-responsive" id="tblEquipments">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th> Item No. </th>
                                        <th> Type </th>
                                        <th> Condition </th>
                                        <th> Availabilty </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($equips as $equip)
                                        <tr>
                                            <td>{{$equip->ItemNo}}</td>
                                            <td>{{$equip->EquipType}}</td>
                                            <td>{{$equip->Condition}}</td>
                                            <td>{{$equip->Availability}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action={{route('adminAddEquip')}}>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-id"> Item No. <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="equip-id" name="equip-id" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-type"> Type <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="equip-type" name="equip-type" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purch-date"> Purchase Date </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="purch-date" name="purch-date" class="form-control" data-inputmask="'mask': '99/99/9999'">
                                        </div>
                                    </div>
                                    <!-- input_mask -->
                                    <script>
                                        $(document).ready(function () {
                                            $(":input").inputmask();
                                        });
                                    </script>
                                    <!-- /input mask -->
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-price"> Purchase Price </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="equip-price" name="equip-price" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-cond"> Condition <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" id="equip-cond" name="equip-cond" required>
                                                <option hidden value=""> Select Condition... </option>
                                                <option> Good </option>
                                                <option> Need to be repaired </option>
                                                <option> Discarded </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-avail"> Availability <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" id="equip-avail" name="equip-avail" required>
                                                <option hidden value=""> Select Availability... </option>
                                                <option value="1"> Available </option>
                                                <option value="0"> Not Available </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-sport"> Sport <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" id="equip-sport" name="equip-sport" required="required">
                                                    <option>Cricket</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="button" class="btn btn-primary">Cancel</button>
                                            <button type="submit" class="btn btn-success">Add Equipment</button>
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

@section('requiredJS')
    <!-- input mask -->
    <script src="js/input_mask/jquery.inputmask.js"></script>
@endsection