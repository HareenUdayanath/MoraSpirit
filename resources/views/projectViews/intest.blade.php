<select>
    @foreach($users as $user)
        <option>{{$user->Name}}</option>
    @endforeach
</select>
