@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Brand Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="brandname" value="{{$brand->brand_name}}" readonly>
    </div>
    <a href="{{url('/brand')}}" class="btn btn-primary">Brand</a>
</div>
@include('footer')