@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
  <div class="row">
        <div class="col">
            <h2>Genders List</h2>
        </div>
        <div class="col">
            <a href="{{url('/gender/create')}}" type="button" class="btn btn-primary btn-lg">Add Gender</a>
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
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($gender as $gen)
  <tr>
    <td>{{$gen->id}}</td>
    <td>{{$gen->gender_name}}</td>
    <td>{{date_format(date_create($gen->created_at),"d-m-Y h:m:s")}}</td>
    <td>{{date_format(date_create($gen->updated_at), "d-m-Y h:m:s")}}</td>
    <td><a class="btn btn-link" href="{{url('/gender/'.$gen->id.'/edit')}}">Edit</a></td>
    <td>
      <form method="POST" action="{{ url('gender').'/'.$gen->id }}">
        @csrf
        @METHOD('DELETE')
        <button type="submit" class="btn btn-link">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{$gender->links()}}
</div>
@include('footer')