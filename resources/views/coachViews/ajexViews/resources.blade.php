<select name = "resource" class="form-control" id="resourceList">

    @foreach($resources as $resource)
        <option>{{$resource->Name}}</option>
    @endforeach
</select>
