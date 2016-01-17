       @foreach($reservedtimes as $reservedtime)
          <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records" ></td>
              <td class=" ">{{$reservedtime->Name}}</td>
              <td class=" ">{{$reservedtime->Name}} </td>
       @endforeach
