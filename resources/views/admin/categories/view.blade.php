@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
    <div class="row">
        <div class="col">
            <h2>Categories List</h2>
        </div>
        <div class="col">
            <a href="{{url('/categories/create')}}" type="button" class="btn btn-primary btn-lg">Add Category</a>
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
  @foreach($categories as $category)
  <tr>
    <td>{{$category->id}}</td>
    <td>{{$category->category_name}}</td>
    <td>{{date_format(date_create($category->created_at),"d-m-Y h:m:s")}}</td>
    <td>{{date_format(date_create($category->updated_at), "d-m-Y h:m:s")}}</td>
    <td><a class="btn btn-link" href="{{url('/categories').'/'.$category->id.'/edit'}}">Edit</a></td>
    <td>
      <form action="{{url('/categories').'/'.$category->id}}" method="POST">
        @csrf
        @METHOD('DELETE')
        <button class="btn btn-link" type="submit">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{$categories->links()}}
</div>
@include('footer')