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
    <h3>Students</h3>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Manage Students</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Add New Student</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <section class="content">
                    <div class="row">
                        <label class=" col-md-1 col-sm-1 col-xs-1" style="padding-top: 5px;"> Search By: </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <select class="form-control" id="search-type">
                                <option> Name </option>
                                <option> Student ID </option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for..." id="search-term">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="searchStudent()">Go!</button>
                                    </span>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function searchStudent(){
                                var keyword = document.getElementById('search-term').value;
                                if (keyword==''){
                                    alert('Please enter a key word');
                                }else{
                                    var searchType = document.getElementById('search-type');
                                    var selectedtype = searchType.options[searchType.selectedIndex].text;
                                    if (selectedtype=='Name'){
                                        $.ajax({
                                            url:'{{url('adminSearchStudentName')}}/'+keyword,
                                            success:function(data){
                                                if(data==1){}
                                                else{
                                                    $('#tblStudents').html(data).show();
                                                }
                                            }
                                        });
                                    }else{
                                        $.ajax({
                                            url:'{{url('adminSearchStudentID')}}/'+keyword,
                                            success:function(data){
                                                if(data==1){}
                                                else{
                                                    $('#tblStudents').html(data).show();
                                                }
                                            }
                                        });
                                    }
                                }
                            }
                        </script>
                        <div class="col-xs-12">
                            <div class="table-responsive" id="tblStudents">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th> Student ID </th>
                                        <th> Name </th>
                                        <th> Department </th>
                                        <th> Faculty</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $std)
                                        <tr>
                                            <td>{{$std->ID}}</td>
                                            <td>{{$std->FirstName}}</td>
                                            <td>{{$std->Department}}</td>
                                            <td>{{$std->Faculty}}</td>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action={{route('adminAddStudent')}}>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-id"> ID <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="std-id" name="std-id" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-name"> Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="std-name" name="std-name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Date of Birth </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-address"> Address </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="std-address" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-faculty"> Faculty <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="std-faculty" name="std-faculty" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-dept"> Department <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="std-dept" name="std-dept" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-emrg-per"> Emergency Contact Person </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="std-emrg-per" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-emrg-num"> Emergency Contact Number </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="std-emrg-num" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Blood Group </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control">
                                                <option hidden> Choose a blood group... </option>
                                                <option> A+ </option>
                                                <option> A- </option>
                                                <option> B+ </option>
                                                <option> B- </option>
                                                <option> AB+ </option>
                                                <option> AB- </option>
                                                <option> O+ </option>
                                                <option> O- </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Medical Conditions </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="reset" class="btn btn-primary">Cancel</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
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