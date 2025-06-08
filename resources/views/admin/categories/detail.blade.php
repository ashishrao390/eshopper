@include('header')
        </div>
    </div>
</div>
<div class="container">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Category Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="categoryname" value="{{$category->category_name}}" readonly>
    </div>
    <a href="{{url('/categories')}}" class="btn btn-primary">Categories</a>
</div>
@include('footer')