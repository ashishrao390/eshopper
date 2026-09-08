@include('header')
        </div>
    </div>
</div>
<div class="container">
<form enctype="multipart/form-data">
      @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="product_name" value="{{$product->product_name}}" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Brand</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="brand_name" value="{{$brands->brand_name}}" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Category</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="category_name" value="{{$categories->category_name}}" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Wear Type</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="weartype_name" value="{{$weartype->weartypes_name}}" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Gender</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="gender_name" value="{{$genders->gender_name}}" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Color</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="color_name" value="{{$colors->color_name}}" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Size</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="size_name" value="{{$sizes->size_label}}" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Price</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="price" value="{{$product->price}}" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="discount_name" value="{{$discounts->discount_percentage}}%" disabled>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Description</label>
      <textarea class="form-control"  aria-describedby="emailHelp" name="description" disabled>{{$product->description}}</textarea>
    </div>
    <div class="col-lg-4 col-md-6 pb-1">
    <label for="exampleInputEmail1" class="form-label">Image</label>
      <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
          <a href="{{url('/shop/'.$weartype->weartypes_name)}}" class="cat-img position-relative overflow-hidden mb-3">
              <img class="img-fluid" src="{{url('/')}}/img/{{$product->image_url}}" alt="">
          </a>
      </div>
    </div>
    <a class="btn btn-primary" href="{{url('/products')}}">Products</a>
  </form>
</div>
@include('footer')