@extends('layout.template')


@section('siderBar')
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home</a>

            <li><a href={{route('displayAchieve')}}><i class="fa fa-trophy"></i> Achievements</a>

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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action={{route('addPracticeSchedule')}} >

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="sport-name">Sport Name <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select name = "sport" class="form-control" onchange="getResources(this.options[this.selectedIndex].text)">
                                        <option>Select sport name</option>
                                        @foreach($sports as $sport)
                                            <option>{{$sport->SportName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <script type = "text/javascript">
                                function getResources(sportName){

                                    $.ajax({
                                        url:'{{url('getRes')}}/'+sportName,
                                        success:function(data){

                                            if (data==1){

                                            }else{
                                                $("#resource-name").html(data).show();
                                            }
                                        }
                                    });
                                }
                            </script>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resource-name">Resource Name <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12" id="resource-name">
                                    <select name = "resource" class="form-control" id="resourceList">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input id="scheduleDay" name="date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#scheduleDay').daterangepicker({
                                        singleDatePicker: true,
                                        calender_style: "picker_4"
                                    }, function (start, end, label) {
                                        console.log(start.toISOString(), end.toISOString(), label);
                                    });
                                });
                            </script>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-success">Check</button>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1" name="reseverdSlots" id="reserved-list">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Resevered Time Slots <small>for the given particular date</small></h2>
                                            <ul class="nav navbar-right panel_toolbox">

                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <table class="table table-striped responsive-utilities jambo_table bulk_action" id="reservedTable" name="reservedList">
                                                <thead>
                                                <tr class="headings">

                                                    <th class="column-title">Start Time </th>
                                                    <th class="column-title">End Time </th>


                                                    <th class="bulk-actions" colspan="7">
                                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="even pointer">
                                                    <th class="column-title">10:00 </th>
                                                    <th class="column-title">12:00 </th>
                                                </tr>
                                                <tr class="odd pointer">

                                                </tr>
                                                <tr class="even pointer">

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Start Time <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-1 col-xs-12">
                                    <input type="number" id="start-hour" name="start-hour" required="required" data-validate-minmax="0,12" placeholder="hour" class="form-control col-md-7 col-xs-12">
                                </div>

                                <div class="col-md-2 col-sm-1 col-xs-12">
                                    <input type="number" id="start-minute" name="start-minute" required="required" data-validate-minmax="0,59" placeholder="minute" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <select class="form-control">
                                        <option>am</option>
                                        <option>pm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end-time">End Time <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-1 col-xs-12">
                                    <input type="number" id="end-time" name="end-hour" required="required" data-validate-minmax="0,12" placeholder="hour" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-2 col-sm-1 col-xs-12">
                                    <input type="number" id="end-time" name="end-minute" required="required" data-validate-minmax="0,59" placeholder="minute" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <select class="form-control">
                                        <option>am</option>
                                        <option>pm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
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
    <script src="js/validator/validator.js"></script>
    <script>
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
                .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                .on('change', 'select.required', validator.checkField)
                .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
                .on('keyup blur', 'input', function () {
                    validator.checkField.apply($(this).siblings().last()[0]);
                });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });

        /* FOR DEMO ONLY */
        $('#vfields').change(function () {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function () {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>

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

