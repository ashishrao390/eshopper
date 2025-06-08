@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('categories', $category)}}">
      @csrf @method('PATCH')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Category Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="categoryname" value="{{$category->category_name}}">
      @error('categoryname')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a href="{{url('/categories')}}" class="btn btn-primary">Categories</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@include('footer')