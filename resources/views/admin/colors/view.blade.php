@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
  <div class="row">
        <div class="col">
            <h2>Colors List</h2>
        </div>
        <div class="col">
            <a href="{{url('/colors/create')}}" type="button" class="btn btn-primary btn-lg">Add Color</a>
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
  @foreach($colors as $color)
  <tr>
    <td>{{$color->id}}</td>
    <td><span class="color-circle" style="background-color: {{$color->color_name}};"></span> {{$color->color_name}}</td>
    <td>{{date_format(date_create($color->created_at),"d-m-Y h:m:s")}}</td>
    <td>{{date_format(date_create($color->updated_at), "d-m-Y h:m:s")}}</td>
    <td><a class="btn btn-link" href="{{url('/colors').'/'.$color->id}}">View</a></td>
    <td><a class="btn btn-link" href="{{url('/colors').'/'.$color->id.'/edit'}}">Edit</a></td>
    <td>
      <form action="{{url('/colors').'/'.$color->id}}" method="POST">
        @csrf
        @METHOD('DELETE')
        <button class="btn btn-link" type="submit">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{$colors->links()}}
</div>
@include('footer')