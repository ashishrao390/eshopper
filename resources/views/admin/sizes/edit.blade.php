@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('sizes', $size)}}">
      @csrf
      @method('PATCH')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Size Label</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="sizelabel" value="{{$size->size_label}}">
      @error('sizelabel')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a class="btn btn-primary" href="{{url('/sizes')}}">Sizes</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@include('footer')