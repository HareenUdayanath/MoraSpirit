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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Resource</label>
                    <div class="col-md-4 col-sm-9 col-xs-12">
                        <select class="form-control" id="resource">
                            @foreach($resources as $resource)
                                <option>{{$resource->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Reservation Date <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="resdate" class="date-picker form-control col-md-7 col-xs-12 active" required="required" type="text" data-parsley-id="2514"><ul class="parsley-errors-list" id="parsley-id-2514"></ul>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#resdate').daterangepicker({
                            singleDatePicker: true,
                            calender_style: "picker_4"
                        }, function (start, end, label) {
                            console.log(start.toISOString(), end.toISOString(), label);
                        });
                    });
                </script>

                <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <label>
                        <input type="checkbox" class="flat" onclick="disableTxt()"> All day
                    </label>
                </div>
                    </div>

                <script>
                    function disableTxt() {
                        document.getElementById("fromH").disabled = "disabled";
                        /*document.getElementById("myText").disabled = true;
                        document.getElementById("myText").disabled = true;
                        document.getElementById("myText").disabled = true;
                        document.getElementById("myText").disabled = true;
                        document.getElementById("myText").disabled = true;*/

                    }

                    function loadtimes(){


                    }
                    </script>

                <div class="form-group" id ="timeInput" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">From <span class="required"></span>
                    </label>

                        <div class="col-md-2 col-sm-9 col-xs-12">
                            <input type="number" id="fromH" name="fromH"  data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" >
                        </div>

                    <div class="col-md-2 col-sm-9 col-xs-12">
                        <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
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
                    <div class="col-md-2 col-sm-9 col-xs-12">
                        <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-2 col-sm-9 col-xs-12">
                        <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-12">
                        <select class="form-control">
                            <option>AM</option>
                            <option>PM</option>

                        </select>
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
                                <tr class="even pointer" id ="restimes">


                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <script type = "text/javascript">
                    function loadtimes(){

                        var reqres = resource.options[resource.selectedIndex].text;
                        var resource = document.getElementById("resource").value;

                        //alert(sport);
                        $.ajax({
                            url:'{{url('loadeqp')}}/'+ reqres + '/' ,
                            success: function(data){
                                if (data ==1){

                                }
                                else{
                                    //alert(data);
                                    $('#restimes').html(data).show();
                                }

                            }
                        })
                    }
                    </script>



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

