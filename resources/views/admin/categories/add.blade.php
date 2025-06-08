@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/')}}/categories">
      @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Category Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="categoryname" value="{{old('categoryname')}}">
      @error('categoryname')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a href="{{url('/categories')}}" class="btn btn-primary">Categories</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@include('footer')