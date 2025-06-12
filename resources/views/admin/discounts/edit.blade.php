@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/discounts', $discount)}}">
      @csrf
      @method('PATCH')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount Name</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="discountname" value="{{$discount->discount_label}}">
      @error('discountname')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount %</label>
      <input type="range" class="form-control" oninput="this.nextElementSibling.value = this.value" min="0" max="100"  aria-describedby="emailHelp" name="discountpercentage" value="{{$discount->discount_percentage}}">
      <output>50</output>
      <b>% <small>[0%-100%]</small></b><br><br>
      @error('discountpercentage')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount Start Date</label>
      <input type="date" class="form-control"  aria-describedby="emailHelp" name="startdate" value="{{$discount->start_date}}">
      @error('startdate')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount End Date</label>
      <input type="date" class="form-control"  aria-describedby="emailHelp" name="enddate" value="{{$discount->end_date}}">
      @error('enddate')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <a class="btn btn-primary" href="{{url('/discounts')}}">Discounts</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@include('footer')