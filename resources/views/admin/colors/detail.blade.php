@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/')}}/colors">
      @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Color Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="colorname" value="{{$color->color_name}}" readonly>
      @error('colorname')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a class="btn btn-primary" href="{{url('/colors')}}">Colors</a>
  </form>
</div>
@include('footer')