@include('header')
        </div>
    </div>
</div>
<div class="container">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Size Label</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="sizelabel" value="{{$size->size_label}}" readonly>
      @error('sizelabel')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a class="btn btn-primary" href="{{url('/sizes')}}">Sizes</a>
</div>
@include('footer')