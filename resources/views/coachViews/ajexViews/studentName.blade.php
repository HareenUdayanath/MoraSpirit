<div class="col-md-6 col-sm-6 col-xs-12" id="student-name">
    @if(!empty($stdName))
        <input type="text"   disabled required="required" class="form-control col-md-7 col-xs-12" value="{{$stdName}}">
        <input hidden value="1" id="sucess">
    @else
        <input type="text"   disabled required="required" class="form-control col-md-7 col-xs-12" value="Please enter valid index">
        <input hidden value="0" id="sucess">
        <!--script type="text/javascript" >
            function setIdToNull(){
                document.getElementById('index-number').value="";
            }
        </script-->

    @endif

</div>