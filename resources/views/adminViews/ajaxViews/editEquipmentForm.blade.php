<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action={{--route('')--}}>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-id"> Item No. <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="equip-id" name="equip-id" required="required" class="form-control col-md-7 col-xs-12" value="{{$equip->ItemNo}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-type"> Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="equip-type" name="equip-type" required="required" class="form-control col-md-7 col-xs-12" value="{{$equip->EquipType}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purch-date"> Purchase Date </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="purch-date" name="purch-date" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '99/99/9999'">
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
                            <input type="text" id="equip-price" name="equip-price" class="form-control col-md-7 col-xs-12" value="{{$equip->PurchasePrice}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-cond"> Condition <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="equip-cond" name="equip-cond" required>
                                <option> Good </option>
                                <option> Need to be repaired </option>
                                <option> Discarded </option>
                                <option hidden selected>{{$equip->Condition}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-avail"> Availability <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="equip-avail" name="equip-avail" required>
                                <option value="1"> Available </option>
                                <option value="0"> Not Available </option>
                                @if($equip->Availability=="1")
                                     <option hidden selected value="1">Available</option>
                                @else
                                    <option hidden selected value="0">Not Available</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="equip-sport"> Sport <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="equip-sport" name="equip-sport" required="required">
                                @foreach($sports as $sport)
                                    <option>{{$sport->SportName}}</option>
                                @endforeach
                                <option hidden selected>{{$equip->SportName}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-primary" onclick="hideContent()">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function hideContent(){
                            document.getElementById("selected-index").value = "";
                            $('#tab_content3').html("<p align='center'> Select a student in View tab to Edit here</p>");
                            $('.nav-tabs a[href="#tab_content1"]').tab('show');
                            $("html, body").animate({ scrollTop: 0 }, "slow");
                        }
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>