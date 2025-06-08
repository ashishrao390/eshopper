@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
  <form method="POST" action="{{url('brand', $brand)}}">
    @csrf @method('PATCH')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Brand Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="brandname" value="{{$brand->brand_name}}">
      @error('brandname')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a href="{{url('/brand')}}" class="btn btn-primary">Brand</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@include('footer')