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
                <a><i class="fa fa-building-o"></i> Resources </a>
            </li>
            <li>
                <a href={{route('adminStudents')}}><i class="fa fa-child"></i> Students </a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <h3>Resources</h3>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Manage Resources</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Add New Resource</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <section class="content">
                    <div class="row">
                        <label class=" col-md-1 col-sm-1 col-xs-1" style="padding-top: 5px;"> Search By: </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <select class="form-control">
                                <option> Name </option>
                                <option> Resource ID </option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Resource ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Sports</th>
                                        <th>Keepers</th>
                                    </tr>
                                    </thead>
                                    {{--<tbody>
                                    @foreach($users as $usr)
                                        <tr>
                                            <td>{{$usr->ID}}</td>
                                            <td>{{$usr->Name}}</td>
                                            <td>{{$usr->ContactNo}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>--}}
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-id"> ID <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="user-id" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-name"> Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="user-name" name="user-name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact-num"> Location <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="contact-num" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Keeper <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control">
                                                <option>Choose option</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button type="submit" class="btn btn-success">Add Resource</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#birthday').daterangepicker({
                            singleDatePicker: true,
                            calender_style: "picker_4"
                        }, function (start, end, label) {
                            console.log(start.toISOString(), end.toISOString(), label);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection

@section('requiredJS')
@endsection