
    <div class="panel-heading">Details</div>
    <div class="panel-body">
        <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left input_mask">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Borrowed Date</label>
                    <div class="col-md-4 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" readonly="readonly" placeholder="" value={{$recEqp[0]->StartDate}} >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Due Date</label>
                    <div class="col-md-4 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" readonly="readonly" placeholder="" value={{$recEqp[0]->EndDate}}>
                    </div>
                </div>
            </form>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="button" class="btn btn-primary" id = "confirm" onclick="setAvailability()">Confirm</button>
                <button type="" class="btn btn-success">Cancel</button>
            </div>
        </div>
    </div>
