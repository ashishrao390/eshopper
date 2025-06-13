@include('header')
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Sales List</h2>
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
            <th>User ID</th>
            <th>Product ID</th>
            <th>Discount ID</th>
            <th>Quantity</th>
            <th>Actual Price</th>
            <th>Sales Price</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        @foreach($sales as $sale)
        <tr>
            <td>{{$sale->id}}</td>
            <td>{{$sale->user_id}}</td>
            <td>{{$sale->product_id}}</td>
            <td>{{$sale->discount_id}}</td>
            <td>{{$sale->quantity}}</td>
            <td>{{$sale->actual_price}}</td>
            <td>{{$sale->sales_price}}</td>
            <td>{{date_format(date_create($sale->created_at), "d-m-Y h:m:s")}}</td>
            <td>{{date_format(date_create($sale->updated_at), "d-m-Y h:m:s")}}</td>
        </tr>
        @endforeach
    </table>
    {{$sales->links()}}
</div>
@include('footer')