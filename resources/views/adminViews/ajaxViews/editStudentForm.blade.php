<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action={{--route('adminAddStudent')--}}>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-id"> ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="std-id" name="std-id" required="required" class="form-control col-md-7 col-xs-12" value="{{$student->ID}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-name"> Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="std-name" name="std-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$student->FirstName}}">
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
                            <input type="text" id="std-faculty" name="std-faculty" required="required" class="form-control col-md-7 col-xs-12" value="{{$student->Faculty}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std-dept"> Department <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="std-dept" name="std-dept" required="required" class="form-control col-md-7 col-xs-12" value="{{$student->Department}}">
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
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Sport(s) <span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <table class="table table-bordered table-hover" id="tab_logic">
                                <tbody>
                                <tr id="addr0">
                                    <td>
                                        <select class="form-control" name="sport0" required value="Cricket">
                                            <!--option hidden value=""> Choose a Sport... </option-->
                                            @foreach($sports as $sport)
                                                <option>{{$sport->SportName}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr id="addr1"></tr>
                                </tbody>
                            </table>
                            <a id="add_row" class="btn btn-default pull-left">Add Sport</a><a id='delete_row' class="pull-right btn btn-default">Remove Sport</a>
                            <script>
                                $(document).ready(function(){
                                    var i=1;
                                    $("#add_row").click(function(){
                                        $('#addr'+i).html("<td><select class='form-control' required name='sport"+i+"'> <option hidden value=''> Choose a Sport... </option> @foreach($sports as $sport)<option>{{$sport->SportName}}</option> @endforeach </select></td>");

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
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-primary" onclick="hideContent()">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        <script type="text/javascript">
                            function hideContent(){
                                document.getElementById("selected-index").value = "";
                                $('#tab_content3').html("<p align='center'> Select a student in View tab to Edit here</p>");
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