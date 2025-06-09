@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/gender', $gender)}}">
      @csrf
      @method('PATCH')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Gender Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="gendername" value="{{$gender->gender_name}}">
      @error('gendername')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a class="btn btn-primary" href="{{url('/gender')}}">Gender</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@include('footer')