
<div class="panel-heading">Details</div>
<div class="panel-body"><div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Equipment Type</label>
        <div class="col-md-4 col-sm-9 col-xs-12">
            <input type="text" class="form-control" readonly="readonly" placeholder="" value={{$updateEqp[0]->Type}}>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sport</label>
        <div class="col-md-4 col-sm-9 col-xs-12">
            <input type="text" class="form-control" readonly="readonly" placeholder="" value={{$updateEqp[0]->SportName}}>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Availability</label>
        <div class="col-md-4 col-sm-9 col-xs-12">
            <select class="form-control" id="availability">
                <option>Available</option>
                <option>Borrowed</option>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Condition</label>
        <div class="col-md-4 col-sm-9 col-xs-12">
            <select class="form-control" id="condition">
                <option>Good</option>
                <option>Needs to be repaired</option>
                <option>Discarded</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Purchased Date</label>
        <div class="col-md-4 col-sm-9 col-xs-12">
            <input type="text" class="form-control" readonly="readonly" placeholder="" value={{$updateEqp[0]->PurchaseDate}}>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Purchase Price</label>
        <div class="col-md-4 col-sm-9 col-xs-12">
            <input type="text" class="form-control" readonly="readonly" placeholder="" value={{$updateEqp[0]->PurchasePrice}}>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="button" class="btn btn-primary" id="update" onclick="sendData()">Update</button>

        </div>
    </div>
</div>