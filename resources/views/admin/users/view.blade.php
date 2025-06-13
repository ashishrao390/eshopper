@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->
    <div class="row">
        <div class="col">
            <h2>Users List</h2>
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
    <th>User Name</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
    <th>State</th>
    <th>Registration Date</th>
    <th>Terms</th>
    <th>Newsletter</th>
    <th>Promotions</th>
    <th>Status</th>
    <th>Email Verified</th>
    <th>Created at</th>
    <th>Updated at</th>
  </tr>
  @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->username}}</td>
    <td>{{$user->fname}}</td>
    <td>{{$user->lname}}</td>
    <td>{{$user->gender_id}}</td>
    <td>{{$user->age}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->address}}</td>
    <td>{{$user->state}}</td>
    <td>{{$user->rdate}}</td>
    <td>{{$user->terms}}</td>
    <td>{{$user->newsletter}}</td>
    <td>{{$user->promotion}}</td>
    <td>{{$user->status}}</td>
    <td>{{$user->email_verified_at}}</td>
    <td>{{date_format(date_create($user->created_at),"d-m-Y h:m:s")}}</td>
    <td>{{date_format(date_create($user->updated_at), "d-m-Y h:m:s")}}</td>
  </tr>
  @endforeach
</table>
{{$users->links()}}
</div>
@include('footer')