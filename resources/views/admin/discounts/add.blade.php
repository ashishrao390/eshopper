@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/')}}/discounts">
      @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="discountname" value="{{old('discountname')}}">
      @error('discountname')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount %</label>
      <input type="range" class="form-control" oninput="this.nextElementSibling.value = this.value" min="0" max="100"  aria-describedby="emailHelp" name="discountpercentage" value="{{old('discountpercentage')}}">
      <output>50</output>
      <b>% <small>[0%-100%]</small></b><br><br>
      @error('discountpercentage')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount Start Date</label>
      <input type="date" class="form-control"  aria-describedby="emailHelp" name="startdate" value="{{old('startdate')}}">
      @error('startdate')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount End Date</label>
      <input type="date" class="form-control"  aria-describedby="emailHelp" name="enddate" value="{{old('enddate')}}">
      @error('enddate')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@include('footer')