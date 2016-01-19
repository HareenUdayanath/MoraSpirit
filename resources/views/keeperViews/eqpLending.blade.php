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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Sport</label>
                    <div class="col-md-4 col-sm-9 col-xs-12">
                        <select class="form-control" id="spselect" onchange="geteqp(this.options[this.selectedIndex].text);">
                            @foreach($sports as $sport)
                                <option >{{$sport->SportName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Equipment</label>
                    <div class="col-md-4 col-sm-9 col-xs-12" id="eqpselect">
                        <select class="form-control" id="eqselect">
                        </select>
                    </div>
                </div>

                <script type = "text/javascript">
                    function geteqp(sport){
                        //alert(sport);
                        $.ajax({
                            url:'{{url('loadeqp')}}/'+ sport,
                            success: function(data){
                                if (data ==1){

                                }
                                else{
                                    //alert(data);
                                    $('#eqpselect').html(data).show();
                                }

                            }
                        })
                    }

                    function getAveqp(){

                        var sportele = document.getElementById("spselect");
                        var eqp = document.getElementById("eqselect");
                        var sport = sportele.options[sportele.selectedIndex].text;
                        var equipment = eqp.options[eqp.selectedIndex].text;

                        $.ajax({
                            url:'{{url('chkAv')}}/'+ equipment + '/' + sport,
                            success: function(data){
                                if (data == null){
                                    alert("No equipments are available");

                                }
                                else{
                                   alert(data);
                                    $('#eqID').html(data).show();
                                }

                            }
                        })

                    }

                    function reserveEqp(){
                        var eqp = document.getElementById("eqselect");
                        var equipment = eqp.options[eqp.selectedIndex].text;
                        var studentID = document.getElementById("studentID").value;
                        $.ajax({
                            url:'{{url('reserveEqp')}}/'+ equipment + '/' + studentID,
                            success: function(data){
                                if (data == null){
                                    alert("No equipments are available");

                                }
                                else{
                                    alert("Request successful!");
                                    //$('#eqID').html(data).show();
                                }

                            }
                        })

                    }

                    function lendEqp(){
                        var lendstID = document.getElementById("lendstid");
                        var eqpID = document.getElementById("eqID");
                        var duedate = document.getElementById("birthday");
                        var lendID = eqpID.options[eqpID.selectedIndex].text
                        $.ajax({
                            url:'{{url('lendEqp')}}/'+ lendstID + '/' + lendID + '/' + duedate,
                            success: function(data){
                                if (data == null){
                                    alert("No equipments are available");

                                }
                                else{
                                    alert("Request successful!");
                                    //$('#eqID').html(data).show();
                                }

                            }
                        })



                    }

                </script>

                <div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button" onclick="getAveqp();" >Check Availability</button>

                    </div>
                </div>

                <script>

                    function displaySelects(){
                        var sport = document.getElementById("spselect");
                        var eqp = document.getElementById("eqselect");
                        var selectedSport = sport.options[sport.selectedIndex].text;
                        var selectedEqp = eqp.options[eqp.selectedIndex].text;
                        alert(selectedEqp+" "+selectedSport);
                    }

                </script>




                <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Reserve Equipment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Index <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" id="studentID"  class="form-control col-md-4 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-primary" onclick="reserveEqp();">Reserve</button>
                                    <button type="" class="btn btn-success">Cancel</button>
                                </div>
                            </div>

                            </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Lend Equipment</div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Index <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="lendstid"  class="form-control col-md-4 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Equipment ID <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12" id="eqID">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Due Date</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12 active"   type="text" data-parsley-id="2514"><ul class="parsley-errors-list" id="parsley-id-2514"></ul>
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

@section('requiredJS')
    <script src="js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    <!-- tags -->
    <script src="js/tags/jquery.tagsinput.min.js"></script>
    <!-- switchery -->
    <script src="js/switchery/switchery.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min2.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
    <!-- richtext editor -->
    <script src="js/editor/bootstrap-wysiwyg.js"></script>
    <script src="js/editor/external/jquery.hotkeys.js"></script>
    <script src="js/editor/external/google-code-prettify/prettify.js"></script>
    <!-- select2 -->
    <script src="js/select/select2.full.js"></script>
    <!-- form validation -->
    <script type="text/javascript" src="js/parsley/parsley.min.js"></script>
    <!-- textarea resize -->
    <script src="js/textarea/autosize.min.js"></script>
    <script>
        autosize($('.resizable_textarea'));
    </script>
    <!-- Autocomplete -->
    <script type="text/javascript" src="js/autocomplete/countries.js"></script>
    <script src="js/autocomplete/jquery.autocomplete.js"></script>
    <script type="text/javascript">
        $(function () {
            'use strict';
            var countriesArray = $.map(countries, function (value, key) {
                return {
                    value: value,
                    data: key
                };
            });
            // Initialize autocomplete with custom appendTo:
            $('#autocomplete-custom-append').autocomplete({
                lookup: countriesArray,
                appendTo: '#autocomplete-container'
            });
        });
    </script>
    <script src="js/custom.js"></script>


    <!-- select2 -->
    <script>
        $(document).ready(function () {
            $(".select2_single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
            $(".select2_group").select2({});
            $(".select2_multiple").select2({
                maximumSelectionLength: 4,
                placeholder: "With Max Selection limit 4",
                allowClear: true
            });
        });
    </script>
    <!-- /select2 -->
    <!-- input tags -->
    <script>
        function onAddTag(tag) {
            alert("Added a tag: " + tag);
        }

        function onRemoveTag(tag) {
            alert("Removed a tag: " + tag);
        }

        function onChangeTag(input, tag) {
            alert("Changed a tag: " + tag);
        }

        $(function () {
            $('#tags_1').tagsInput({
                width: 'auto'
            });
        });
    </script>
    <!-- /input tags -->
    <!-- form validation -->
    <script type="text/javascript">
        $(document).ready(function () {
            $.listen('parsley:field:validate', function () {
                validateFront();
            });
            $('#demo-form .btn').on('click', function () {
                $('#demo-form').parsley().validate();
                validateFront();
            });
            var validateFront = function () {
                if (true === $('#demo-form').parsley().isValid()) {
                    $('.bs-callout-info').removeClass('hidden');
                    $('.bs-callout-warning').addClass('hidden');
                } else {
                    $('.bs-callout-info').addClass('hidden');
                    $('.bs-callout-warning').removeClass('hidden');
                }
            };
        });

        $(document).ready(function () {
            $.listen('parsley:field:validate', function () {
                validateFront();
            });
            $('#demo-form2 .btn').on('click', function () {
                $('#demo-form2').parsley().validate();
                validateFront();
            });
            var validateFront = function () {
                if (true === $('#demo-form2').parsley().isValid()) {
                    $('.bs-callout-info').removeClass('hidden');
                    $('.bs-callout-warning').addClass('hidden');
                } else {
                    $('.bs-callout-info').addClass('hidden');
                    $('.bs-callout-warning').removeClass('hidden');
                }
            };
        });
        try {
            hljs.initHighlightingOnLoad();
        } catch (err) {}
    </script>
    <!-- /form validation -->
    <!-- editor -->
    <script>
        $(document).ready(function () {
            $('.xcxc').click(function () {
                $('#descr').val($('#editor').html());
            });
        });

        $(function () {
            function initToolbarBootstrapBindings() {
                var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                            'Times New Roman', 'Verdana'],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                $.each(fonts, function (idx, fontName) {
                    fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                });
                $('a[title]').tooltip({
                    container: 'body'
                });
                $('.dropdown-menu input').click(function () {
                    return false;
                })
                        .change(function () {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function () {
                            this.value = '';
                            $(this).change();
                        });

                $('[data-role=magic-overlay]').each(function () {
                    var overlay = $(this),
                            target = $(overlay.data('target'));
                    overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                });
                if ("onwebkitspeechchange" in document.createElement("input")) {
                    var editorOffset = $('#editor').offset();
                    $('#voiceBtn').css('position', 'absolute').offset({
                        top: editorOffset.top,
                        left: editorOffset.left + $('#editor').innerWidth() - 35
                    });
                } else {
                    $('#voiceBtn').hide();
                }
            };

            function showErrorAlert(reason, detail) {
                var msg = '';
                if (reason === 'unsupported-file-type') {
                    msg = "Unsupported format " + detail;
                } else {
                    console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
            };
            initToolbarBootstrapBindings();
            $('#editor').wysiwyg({
                fileUploadError: showErrorAlert
            });
            window.prettyPrint && prettyPrint();
        });
    </script>

@endsection

