@extends('layout.template')


@section('siderBar')
    <div class="menu_section">
        <h3>Keeper</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home </a> </li>
            <li><a><i class="fa fa-edit"></i> Reserve </a>
            </li>
            <li><a><i class="fa fa-desktop"></i> Equipment Lending </a>
            </li>
            <li><a><i class="fa fa-table"></i> Equipment Recieval </a>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Update Details </a>
        </ul>
    </div>
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Equipment Lending</h3>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
                    <div class="col-md-4 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>Sport</option>
                            <option>Cricket</option>
                            <option>Volleyball</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
                    <div class="col-md-4 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>Equipment</option>
                            <option>Cricket bat</option>
                            <option>Volleyball ball</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Check Availability</button>

                    </div>
                </div>




                <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Details</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Index <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" class="form-control col-md-4 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Reserve</button>
                                    <button type="" class="btn btn-success">Cancel</button>
                                </div>
                            </div>

                            </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Details</div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Index <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" class="form-control col-md-4 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Equipment ID <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" class="form-control col-md-4 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Due date <span class="required">*</span>
                                </label>

                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                    <button type="" class="btn btn-success">Cancel</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>



            </form>
    </div>
    </div>
@endsection