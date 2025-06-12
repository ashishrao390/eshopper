@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
  <div class="row">
        <div class="col">
            <h2>Discounts List</h2>
        </div>
        <div class="col">
            <a href="{{url('/discounts/create')}}" type="button" class="btn btn-primary btn-lg">Add Discount</a>
        </div>
    </div>    
@if(session()->has('success'))
    <x-notification-component msg="{{session()->get('success')}}" cls="success"/>
@elseif(session()->has('danger'))    
    <x-notification-component msg="{{session()->get('danger')}}" cls="danger"/>
@endif
<table class="table table-striped">
  <tr>
    <th>#</th>
    <th>Label</th>
    <th>%</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Created at</th>
    <th>Updated at</th>
    <th>View</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($discounts as $discount)
  <tr>
    <td>{{$discount->id}}</td>
    <td>{{$discount->discount_label}}</td>
    <td>{{$discount->discount_percentage}} %</td>
    <td>{{date_format(date_create($discount->start_date),"d-M")}}</td>
    <td>{{date_format(date_create($discount->end_date),"d-M")}}</td>
    <td>{{date_format(date_create($discount->created_at),"d-m-Y h:m:s")}}</td>
    <td>{{date_format(date_create($discount->updated_at), "d-m-Y h:m:s")}}</td>
    <td><a class="btn btn-link" href="{{url('/discounts').'/'.$discount->id}}">View</a></td>
    <td><a class="btn btn-link" href="{{url('/discounts').'/'.$discount->id.'/edit'}}">Edit</a></td>
    <td>
      <form action="{{url('/discounts').'/'.$discount->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-link" type="submit">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{$discounts->links()}}
</div>
@include('footer')