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
                    <h3>Reserve Resources</h3>
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
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <label>
                        <input type="checkbox" class="flat"> All day
                    </label>
                </div>
                    </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">From <span class="required"></span>
                    </label>
                    <div class="col-md-1 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>00</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>AM</option>
                            <option>PM</option>

                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">To <span class="required"></span>
                    </label>
                    <div class="col-md-1 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>00</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>AM</option>
                            <option>PM</option>

                        </select>
                    </div>

                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker3'>
                                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker3').datetimepicker({
                                    format: 'LT'
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Check</button>
                        <button type="" class="btn btn-success">Cancel</button>
                    </div>
                </div>


                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Available Times </h2>
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



                            <table class="table table-striped responsive-utilities jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Date </th>
                                    <th class="column-title">Time </th>


                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="even pointer">
                                    <td class="a-center "><input type="checkbox" class="flat" name="table_records" ></td>
                                    <td class=" ">May 23, 2014</td>
                                    <td class=" ">11:47:56 PM </td>

                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


    </form>
    </div>
    </div>




@endsection