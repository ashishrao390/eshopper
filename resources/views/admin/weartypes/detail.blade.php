@include('header')
        </div>
    </div>
</div>
<div class="container">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Wear Type</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="weartype" value="{{$weartypes_1->weartypes_name}}" readonly>
    </div>
    <a class="btn btn-primary" href="{{url('/weartypes')}}">Wear Types</a>
</div>
@include('footer')