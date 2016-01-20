@extends('layout.template')

@section('siderBar')
    <div class="menu_section">
        <h3>Admin</h3>
        <ul class="nav side-menu">
            <li>
                <a href={{route('adminHome')}}> <i class="fa fa-home"></i> Home </a>
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
    <h3>Users</h3>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">View Users</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="new-tab" data-toggle="tab"  aria-expanded="false">Add New User</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="edit-tab" data-toggle="tab"  aria-expanded="false">Edit User</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <section class="content">
                    <div class="row">
                        <label class=" col-md-1 col-sm-1 col-xs-1" style="padding-top: 5px;"> Search By: </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <select class="form-control" id="search-type">
                                <option> ID </option>
                                <option> Name </option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-term" placeholder="Search for...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="searchUser();">Go!</button>
                                    </span>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function searchUser(){
                                var keyword = document.getElementById('search-term').value;
                                if (keyword==''){
                                    alert('Please enter a key word');
                                }else{
                                    document.getElementById("selected-index").value = "";
                                    var searchType = document.getElementById('search-type');
                                    var selectedtype = searchType.options[searchType.selectedIndex].text;
                                    if (selectedtype=='Name'){
                                        $.ajax({
                                            url:'{{url('adminSearchUserName')}}/'+keyword,
                                            success:function(data){
                                                if(data!=1){
                                                    $('#tblusers').html(data).show();
                                                }
                                            }
                                        });
                                    }else{
                                        $.ajax({
                                            url:'{{url('adminSearchUserID')}}/'+keyword,
                                            success:function(data){
                                                if(data==1){}
                                                else{
                                                    $('#tblusers').html(data).show();
                                                }
                                            }
                                        });
                                    }
                                }
                            }
                        </script>
                        <input type="hidden" name="selected-index" id="selected-index" value="">
                        <div class="col-xs-12">
                            <div class="table-responsive" id="tblusers">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Role</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $usr)
                                        <tr class="clickable-row">
                                            <td>{{$usr->ID}}</td>
                                            <td>{{$usr->Name}}</td>
                                            <td>{{$usr->ContactNo}}</td>
                                            <td>{{$usr->Role}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <script type='text/javascript'>
                                    $('#example1').on('click', '.clickable-row', function(event) {
                                        $(this).addClass('bg-info').siblings().removeClass('bg-info');
                                        document.getElementById("selected-index").value = $(this).find('td:first').text();
                                    });
                                </script>
                            </div>
                        </div>
                        <button class="btn btn-primary pull-right" type="button" onclick="editUser()">Edit User</button>
                    </div>
                    <script type="text/javascript">
                        function editUser(){
                            var stdID = document.getElementById("selected-index").value;
                            if (stdID==""){
                                alert('Please select a student');
                            }else{
                                $.ajax({
                                    url:'{{url('adminLoadUser')}}/'+stdID,
                                    success:function(data){
                                        if(data!=1){
                                            $('#tab_content3').html(data);
                                            $('.nav-tabs a[href="#tab_content3"]').tab('show')
                                            $("html, body").animate({ scrollTop: 0 }, "slow");
                                        }
                                    }
                                });
                            }
                        }
                    </script>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action={{route('adminAddUser')}}>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-id"> ID <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="user-id" name="user-id" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-name"> Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="user-name" name="user-name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-dob"> Date of Birth </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" data-inputmask="'mask': '9999/99/99'" id="user-dob" name="user-dob">
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Gender </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div id="gender" class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-default" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                                    <input type="radio" name="gender" value="male" data-parsley-multiple="gender" data-parsley-id="7120"> &nbsp; Male &nbsp;
                                                </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
                                                <label class="btn btn-default" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                                    <input type="radio" name="gender" value="female" checked="" data-parsley-multiple="gender" data-parsley-id="7120"> Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-addr"> Address </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="user-addr" name="user-addr" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact-num"> Contact Number <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="contact-num" name="contact-num" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-role"> Role <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" required onchange="loadSportsOrResources()" id="user-role" name="user-role">
                                                <option hidden value=""> Select a role... </option>
                                                <option> Admin </option>
                                                <option> Coach </option>
                                                <option> Keeper </option>
                                            </select>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function loadSportsOrResources(){
                                            var roledrop = document.getElementById('user-role');
                                            var role = roledrop.options[roledrop.selectedIndex].text;
                                            if(role=='Coach'){
                                                $.ajax({
                                                    url:'{{url('adminLoadSports')}}/'+'user',
                                                    success:function(data){
                                                        if(data!=1){
                                                            $('#sportResourcefield').html(data).show();
                                                        }
                                                    }
                                                });
                                            }else if(role=='Keeper'){
                                                $.ajax({
                                                    url:'{{url('adminLoadResources')}}/'+'user',
                                                    success:function(data){
                                                        if(data!=1){
                                                            $('#sportResourcefield').html(data).show();
                                                        }
                                                    }
                                                });
                                            }else if(role=='Admin'){
                                                $('#sportResourcefield').html('');
                                            }
                                        }
                                    </script>
                                    <div class="form-group" id="sportResourcefield"> </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="button" class="btn btn-dark" onclick="goToView()">Cancel</button>
                                            <button type="submit" class="btn btn-success pull-right">Add New User</button>
                                            <button type="reset" class="btn btn-primary pull-right">Reset</button>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function goToView(){
                                            document.getElementById("demo-form2").reset();
                                            $('.nav-tabs a[href="#tab_content1"]').tab('show');
                                            $("html, body").animate({ scrollTop: 0 }, "slow");
                                        }
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="edit-tab">
                <p align="center"> Select a user in View tab to Edit here</p>
            </div>
        </div>
    </div>
@endsection

@section('requiredJS')
        <!-- input mask -->
    <script src="js/input_mask/jquery.inputmask.js"></script>
@endsection