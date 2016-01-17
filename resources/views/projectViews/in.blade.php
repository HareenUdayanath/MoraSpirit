@extends('layout.template')


@section('siderBar')

@endsection

@section('content')

    <form name = 'form'>
       <input type="text" id = "id" name="name">
       <input type="button" value="Get" onclick="getUser(document.getElementById('id').value);">
    </form>
    <div id="age">
        <select><option>Hello</option></select>
    </div>
    {{--<script type = "text/javascript" src = {{asset('/js/jquery.js')}}></script>--}}
    <script type="text/javascript">
        function getUser(id) {
            $.ajax({
                url: '{{url('getUsers')}}/' + id,
                success: function (data) {
                    //$('#age').html(data).show();

                    if (data == 1) {

                    }
                    else {
                        $('#age').html(data).show();
                    }
                }
            });
        }
    </script>
@endsection