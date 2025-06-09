@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('weartypes', $weartypes_1)}}">
      @csrf
      @method('PATCH')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Wear Type</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="weartype" value="{{$weartypes_1->weartypes_name}}">
      @error('weartype')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a class="btn btn-primary" href="{{url('/weartypes')}}">Wear Types</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@include('footer')