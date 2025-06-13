@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->

  <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">ID</label>
            <input type="email" class="form-control" id="id" disabled value="{{$users->id}}">
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">User Name</label>
            <input type="email" class="form-control" id="username" disabled value="{{$users->username}}">
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">First Name</label>
            <input type="email" class="form-control" id="firstname" disabled value="{{$users->fname}}">
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Last Name</label>
            <input type="email" class="form-control" id="lastname" disabled value="{{$users->lname}}">
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Gender</label>
            <input type="email" class="form-control" id="gender" disabled value="{{$users->gender_id==1?'Male':'Female'}}">
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Age</label>
            <input type="email" class="form-control" id="age" disabled value="{{$users->age}}">
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Phone</label>
            <input type="email" class="form-control" id="phone" disabled value="{{$users->phone}}">
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Email</label>
            <input type="email" class="form-control" id="email" disabled value="{{$users->email}}">
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Address</label>
            <textarea id="address" rows="7" cols="50" type="textarea" class="form-control" disabled>{{$users->address}}</textarea>
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">State</label>
            <input type="email" class="form-control" id="state" disabled value="{{$users->state}}">
          </div>
        </div>
      </div>
    </div>
    <a class="btn btn-primary" href="{{url('/admin')}}">Admin</a>
</div>
<script>
  $(document).ready(function(){
    $('#selectemail').on('change', function(){
      const selectemail = this.value;
      $.ajax({
        method: 'POST',
        data: {
          value:selectemail
        },
        url: '/admin/select-email',
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        },
        success: function(response){
          try {
            $("#id").val(response.data['id']);
            $("#username").val(response.data['username']);
            $("#firstname").val(response.data['fname']);
            $("#lastname").val(response.data['lname']);
            $("#gender").val(response.data['gender_id']);
            $("#age").val(response.data['age']);
            $("#phone").val(response.data['phone']);
            $("#email").val(response.data['email']);
            $("#state").val(response.data['state']);
            const textarea = document.getElementById("address");
            textarea.value = response.data['address'];
          } catch (error) {
            console.log('Failed to parse JSON:');
            console.log(error);
          }
        },
        error: function(xhr, status, error) {
          try {
              const jsonResponse = JSON.parse(xhr.responseText);
              console.log('Parsed JSON:', jsonResponse);
          } catch (e) {
              console.error('Failed to parse JSON:', e);
              console.log('Raw Response:', xhr.responseText);
          }
        }
      })
    })
  })
</script> 
@include('footer')