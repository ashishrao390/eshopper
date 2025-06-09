@include('header')
        </div>
    </div>
</div>
<div class="container">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Gender Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="gendername" value="{{$gender->gender_name}}" readonly>
    </div>
    <a class="btn btn-primary" href="{{url('/gender')}}">Gender</a>
</div>
@include('footer')