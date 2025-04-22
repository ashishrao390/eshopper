@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
  <div class="row">
        <div class="col">
            <h2>Stocks List</h2>
        </div>
        <div class="col">
            <a href="{{url('/stock/create')}}" type="button" class="btn btn-primary btn-lg">Add Stock</a>
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
    <th>Brand</th>
    <th>Category</th>
    <th>Wear Type</th>
    <th>Gender</th>
    <th>Color</th>
    <th>Size</th>
    <th>Price</th>
    <th>Dicount</th>
    <th>Quantity</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($stocks as $stock)
  <tr>
    <td>{{$stock->id}}</td>
    <td>{{$stock->product_name}}</td>
    <td>{{$stock->brand_name}}</td>
    <td>{{$stock->category_name}}</td>
    <td>{{$stock->weartypes_name}}</td>
    <td>{{$stock->gender_name}}</td>
    <td><span class="color-circle" style="background-color: {{$stock->color_name}};"></span> {{$stock->color_name}}</td>
    <td>{{$stock->size_label}}</td>
    <td>{{$stock->price}}/-</td>
    <td>{{$stock->discount_percentage}}</td>
    <td>{{$stock->quantity}}</td>
    <td><a class="btn btn-link" href="{{url('/stock').'/'.$stock->id.'/edit'}}">Edit</a></td>
    <td>
      <form action="{{url('/stock').'/'.$stock->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-link" type="submit">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

  {{$stocks->links()}}
</div>
@include('footer')