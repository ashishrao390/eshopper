@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
  <div class="row">
        <div class="col">
            <h2>Wear Types List</h2>
        </div>
        <div class="col">
            <a href="{{url('/weartypes/create')}}" type="button" class="btn btn-primary btn-lg">Add Wear Type</a>
        </div>
    </div>    
@if(session()->has('success'))
    <x-notification-component msg="{{session()->get('success')}}" cls="success"/>
@elseif(session()->has('danger'))    
    <x-notification-component msg="{{session()->get('danger')}}" cls="danger"/>
@endif
<table class="table table-striped">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Created at</th>
    <th>Updated at</th>
    <th>View</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($weartypes_data as $weartype)
  <tr>
    <td>{{$weartype->id}}</td>
    <td>{{$weartype->weartypes_name}}</td>
    <td>{{date_format(date_create($weartype->created_at),"d-m-Y h:m:s")}}</td>
    <td>{{date_format(date_create($weartype->updated_at), "d-m-Y h:m:s")}}</td>
    <td><a class="btn btn-link" href="{{url('/weartypes').'/'.$weartype->id}}">View</a></td>
    <td><a class="btn btn-link" href="{{url('/weartypes').'/'.$weartype->id.'/edit'}}">Edit</a></td>
    <td>
      <form action="{{url('/weartypes').'/'.$weartype->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-link" type="submit">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{$weartypes_data->links()}}
</div>
@include('footer')