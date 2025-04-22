@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/')}}/products" enctype="multipart/form-data">
      @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="productname" value="{{old('productname')}}">
      @error('productname')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Brand</label>
      <select name="brand" id="brand" class="form-control">
        <option value="" disabled {{ old( 'brand' ) ? '' : 'selected' }}>Select a brand</option>
        @foreach($brands as $brand)
          <option value="{{$brand->id}}" {{ old( 'brand' ) == $brand->id  ? 'selected' : '' }}>{{$brand->brand_name}}</option>
        @endforeach
      </select>
      @error('brand')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
      <select name="category" id="category" class="form-control">
        <option value="" disabled {{ old( 'category' ) ? '' : 'selected' }} >Select a category</option>
        @foreach($categories as $category)
          <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
        @endforeach
      </select>
      @error('category')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Wear Type</label>
      <select name="weartype" id="weartype" class="form-control">
        <option value="" disabled {{ old( 'weartype' ) ? '' : 'selected' }} >Select a wear type</option>
        @foreach($weartypes as $weartype)
          <option value="{{$weartype->id}}" {{old('weartype') == $weartype->id ? 'selected' : '' }} >{{$weartype->weartypes_name}}</option>
        @endforeach
      </select>
      @error('weartype')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Gender</label>
      <select name="gender" id="gender" class="form-control">
        <option value="" disabled {{ old( 'gender' ) ? '' : 'selected' }} >Select a gender</option>
        @foreach($genders as $gender)
          <option value="{{$gender->id}}" {{ old('gender') == $gender->id ? 'selected' : '' }}>{{$gender->gender_name}}</option>
        @endforeach
      </select>
      @error('gender')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Color</label>
      <select name="color" id="color" class="form-control">
        <option value="" disabled {{ old( 'color' ) ? '' : 'selected' }} >Select a color</option>
        @foreach($colors as $color)
          <option value="{{$color->id}}" {{ old('color') == $color->id ? 'selected' : '' }}>{{$color->color_name}}</option>
        @endforeach
      </select>
      @error('color')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Size</label>
      <select name="size" id="size" class="form-control">
        <option value="" disabled {{old('size') ? '' : 'selected' }}>Select a size</option>
        @foreach($sizes as $size)
          <option value="{{$size->id}}" {{ old('size') == $size->id ? 'selected' : '' }}>{{$size->size_label}}</option>
        @endforeach
      </select>
      @error('size')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Price</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="price" value="{{old('price')}}">
      @error('price')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount</label>
      <select name="discounts" id="discounts" class="form-control">
        <option value="" disabled {{old('discounts') ? '' : 'selected' }}>Select a discount</option>
        @foreach($discounts as $discount)
          <option value="{{$discount->id}}" {{ old('discount') == $discount->id ? 'selected' : '' }}>{{$discount->discount_label}}</option>
        @endforeach
      </select>  
      @error('discount')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Description</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="description" value="{{old('description')}}">
      @error('description')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Image</label>
      <input type="file" class="form-control"  aria-describedby="emailHelp" accept="image/*" id="image" name="image">
      @if (session('temp_image'))
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . session('temp_image')) }}" alt="Uploaded Image" style="max-width: 200px;">
        @endif
      @error('image')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@include('footer')