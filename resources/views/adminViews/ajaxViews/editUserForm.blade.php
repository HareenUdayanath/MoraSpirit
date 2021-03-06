<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action={{route('adminUpdateUser')}}>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-id"> ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="user-id" name="user-id" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->ID}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-name"> Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="user-name" name="user-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->Name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-dob"> Date of Birth </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" data-inputmask="'mask': '9999/99/99'" value="{{$user->DoB}}" name="user-dob" id="user-dob">
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
                            @if($user->gender=='male')
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default active" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                        <input type="radio" name="gender" value="male" data-parsley-multiple="gender" data-parsley-id="7120"> &nbsp; Male &nbsp;
                                    </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
                                    <label class="btn btn-default" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                        <input type="radio" name="gender" value="female" checked="" data-parsley-multiple="gender" data-parsley-id="7120"> Female
                                    </label>
                                </div>
                            @elseif($user->gender=='female')
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                        <input type="radio" name="gender" value="male" data-parsley-multiple="gender" data-parsley-id="7120"> &nbsp; Male &nbsp;
                                    </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
                                    <label class="btn btn-default active" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                        <input type="radio" name="gender" value="female" checked="" data-parsley-multiple="gender" data-parsley-id="7120"> Female
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-addr"> Address </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="contact-num" class="form-control col-md-7 col-xs-12" value="{{$user->Address}}" id="user-addr" name="user-addr">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact-num"> Contact Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="contact-num" name="contact-num" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->ContactNo}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-role"> Role <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" required onchange="loadSportsOrResources()" id="user-role-upd" name="user-role">
                                <option hidden selected value="{{$user->Role}}">{{$user->Role}}</option>
                                <option> Admin </option>
                                <option> Coach </option>
                                <option> Keeper </option>
                            </select>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function loadSportsOrResources(){
                            var roledrop = document.getElementById('user-role-upd');
                            var role = roledrop.options[roledrop.selectedIndex].text;
                            alert(role);
                            if(role=='Coach'){
                                alert('df');
                                $.ajax({
                                    url:'{{url('adminLoadSports')}}/'+'user',
                                    success:function(data){
                                        if(data!=1){
                                            $('#sportResourcefield-upd').html(data).show();
                                        }
                                    }
                                });
                            }else if(role=='Keeper'){
                                alert('keper');
                                $.ajax({
                                    url:'{{url('adminLoadResources')}}/'+'user',
                                    success:function(data){
                                        if(data!=1){
                                            $('#sportResourcefield-upd').html(data).show();
                                        }
                                    }
                                });
                            }else if(role=='Admin'){
                                alert("vsd");
                                $('#sportResourcefield-upd').html('');
                            }
                        }
                    </script>
                    <div class="form-group" id="sportResourcefield-upd">
                        @if($user->Role=='Coach')
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-sport-or-res"> Sport </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="user-sport-or-res" name="user-sport-or-res">
                                    @foreach($sports as $sport)
                                        <option>{{$sport->SportName}}</option>
                                    @endforeach
                                    <option hidden selected> {{$coach->SportName}} </option>
                                </select>
                            </div>
                        @elseif($user->Role=='Keeper')
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-sport-or-res"> Resource </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="user-sport-or-res" name="user-sport-or-res">
                                    @foreach($resources as $resource)
                                        <option>{{$resource->Name}}</option>
                                    @endforeach
                                    <option hidden selected>{{$keeper->Name}}</option>
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-dark pull-left" onclick="location.href=document.getElementById('reset-url').value"> Reset Password</button>
                            <button type="submit" class="btn btn-success pull-right">Update</button>
                            <button type="button" class="btn btn-primary pull-right" onclick="hideContent()">Cancel</button>
                        </div>
                        <script type="text/javascript">
                            function hideContent(){
                                document.getElementById("selected-index").value = "";
                                $('#tab_content3').html("<p align='center'> Select a user in View tab to Edit here</p>");
                                $('.nav-tabs a[href="#tab_content1"]').tab('show');
                                $("html, body").animate({ scrollTop: 0 }, "slow");
                            }


                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>