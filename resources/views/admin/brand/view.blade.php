@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
    <div class="row">
        <div class="col">
            <h2>Brands List</h2>
        </div>
        <div class="col">
            <a href="{{url('/brand/create')}}" type="button" class="btn btn-primary btn-lg">Add Brand</a>
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
  @foreach($brands as $brand)
  <tr>
    <td>{{$brand->id}}</td>
    <td>{{$brand->brand_name}}</td>
    <td>{{date_format(date_create($brand->created_at),"d-m-Y h:m:s")}}</td>
    <td>{{date_format(date_create($brand->updated_at), "d-m-Y h:m:s")}}</td>
    <td><a class="btn btn-link" href="{{url('/brand').'/'.$brand->id.'/edit'}}">Edit</a></td>
    <td>
      <form action="{{url('/brand').'/'.$brand->id}}" method="POST">
        @csrf
        @METHOD('DELETE')
        <button type="submit" class="btn btn-link">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{$brands->links()}}
</div>
@include('footer')