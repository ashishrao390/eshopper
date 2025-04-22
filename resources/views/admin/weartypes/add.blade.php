@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/')}}/weartypes">
      @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Wear Type</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="weartype" value="{{old('weartype')}}">
      @error('weartype')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@include('footer')