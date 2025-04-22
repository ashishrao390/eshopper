@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
<div class="row">
  <div class="col">
    <h2>Products List</h2>
  </div>
  <div class="col">
    <a href="{{url('/products/create')}}" type="button" class="btn btn-primary btn-lg">Add Product</a>
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
    <th>Description</th>
    <th>Image URL</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($products as $product)
  <tr>
    <td>{{$product->id}}</td>
    <td>{{$product->product_name}}</td>
    <td>{{$product->brand['brand_name']}}</td>
    <td>{{$product->category['category_name']}}</td>
    <td>{{$product->weartype['weartypes_name']}}</td>
    <td>{{$product->gender['gender_name']}}</td>
    <td><span class="color-circle" style="background-color: {{$product->color['color_name']}};"></span> {{$product->color['color_name']}}</td>
    <td>{{$product->size['size_label']}}</td>
    <td>{{$product->price}}/-</td>
    <td>{{$product->discount['discount_percentage']}} %</td>
    <td>{{substr($product->description,0,50)}}...</td>
    <td>{{$product->image_url}}</td>
    <td><a class="btn btn-link" href="{{url('/products').'/'.$product->id.'/edit'}}">Edit</a></td>
    <td>
      <form action="{{url('/products').'/'.$product->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-link">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{$products->links()}}
</div>
@include('footer')