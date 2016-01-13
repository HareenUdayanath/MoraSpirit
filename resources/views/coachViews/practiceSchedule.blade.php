@extends('layout.template')


@section('siderBar')
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home</a>

            <li><a><i class="fa fa-edit"></i> Achievements</a>

            </li>
        </ul>
    </div>
@endsection

@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Practice Schedule <small>addding schedules for coaches</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sport-name">Sport Name <span class="required">*</span>
                                </label>
                                <!--div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="sport-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div-->
                                <!--div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" class="btn btn-default">Select sport name</button>
                                    <button type="button" id="sport-name" name="sport-name" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Cricket</a>
                                        </li>
                                        <li><a href="#">Volyball</a>
                                        </li>
                                        <li><a href="#">Badminton</a>
                                        </li>

                                    </ul>
                                </div-->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="sport-name" name="sport-name">
                                        <option value="select sport name">Select sport name</option>
                                        <option value="Cricket">Cricket</option>
                                        <option value="Volyball">Volyball</option>
                                        <option value="Badminton">Badminton</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resource-name">Resource Name <span class="required">*</span>
                                </label>
                                <!--div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" class="btn btn-default">Select resource name</button>
                                    <button type="button" id="resource-name" name="resource-name" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Cricket Stadium</a>
                                        </li>
                                        <li><a href="#">Indoor Stadium</a>
                                        </li>
                                        <li><a href="#">New Gym</a>
                                        </li>

                                    </ul>
                                </div-->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="resource-name" name="resource-name">
                                        <option value="select resource name">Select resource name</option>
                                        <option value="Cricket">Cricket Stadium</option>
                                        <option value="Volyball">Indoor Stadium</option>
                                        <option value="Badminton">New Gym</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                </div>
                                <fieldset>
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left active" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start-time">Start Time <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="start-time" name="start-time" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end-time">End Time <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="end-time" name="end-time" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection