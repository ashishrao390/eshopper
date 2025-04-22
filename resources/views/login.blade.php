@include('header')
</div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/')}}/user-login">
    @csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
@include('footer')