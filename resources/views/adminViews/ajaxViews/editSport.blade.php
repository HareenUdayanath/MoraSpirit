<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action={{--route('adminAddSport')--}}>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sport-name"> Sport Name </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="sport-name" name="sport-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$sport->getSportName()}}">
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
                                @foreach($utils as $util)
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