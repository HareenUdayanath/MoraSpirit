<select name = "resource" class="form-control" id="resourceList">
    <option>Select resource name</option>

    @foreach($resources as $resource)
        <option>{{$resource->Name}}</option>
    @endforeach
</select>
