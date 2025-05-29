@include('header')
        </div>
    </div>
</div>
<div class="container">
  <!-- Content here -->

<form method="POST" action="{{url('/')}}/user/">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="username" value="{{old('username')}}">
    @error('username')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" value="{{old('password')}}">
    @error('password')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control"  name="cpassword" value="{{old('cpassword')}}">
    @error('cpassword')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="fname" value="{{old('fname')}}">
    @error('fname')<x-message-component msg={{$message}} cls="danger"/>@enderror    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="lname" value="{{old('lname')}}">
    @error('lname')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <div class="mb-3">
    <div class="form-check form-check-inline">
      <input type="radio" id="male" name="gender" value="1" class="form-check-input" checked value="{{old('gender')}}">
      <label for="html" class="form-check-label">Male</label><br>
    </div>  
    <div class="form-check form-check-inline">
      <input type="radio" id="female" name="gender" value="2" class="form-check-input" value="{{old('gender')}}">
      <label for="css" class="form-check-label">Female</label><br>
    </div>  
    <div class="form-check form-check-inline">
      <input type="radio" id="other" name="gender" value="Other" class="form-check-input" value="{{old('gender')}}">
      <label for="javascript" class="form-check-label">Other</label>
    </div>
    @error('gender')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>  
  <div class="mb-3">
    <label for="age" class="form-label">Age:</label><br>
    <input type="range" class="form-control" id="age" name="age" min="18" max="100" oninput="this.nextElementSibling.value = this.value" value="{{old('age')}}" required>
    <output></output>
    <small>(18-100 years)</small><br><br>
    @error('age')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
    <input type="text" class="form-control"  name="phonenumber" value="{{old('phonenumber')}}">
    @error('phonenumber')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control"  aria-describedby="emailHelp" name="email" value="{{old('email')}}">
    @error('email')<x-message-component msg={{$message}} cls="danger"/>@enderror    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address</label>
    <textarea id="address" name="address" class="form-control" rows="4" cols="50" name="address" value="{{old('address')}}"></textarea>
    @error('address')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">State</label>
    <select name="state" class="form-control" value="{{old('state')}}">
      <option value="AndhraPradesh">Andhra Pradesh</option>
      <option value="ArunachalPradesh">Arunachal Pradesh</option>
      <option value="Assam">Assam</option>
      <option value="Bihar">Bihar</option>
      <option value="Chhattisgarh">Chhattisgarh</option>
      <option value="Goa">Goa</option>
      <option value="Gujarat">Gujarat</option>
      <option value="Haryana">Haryana</option>
      <option value="HimachalPradesh">Himachal Pradesh</option>
      <option value="Jharkhand">Jharkhand</option>
      <option value="Karnataka">Karnataka</option>
      <option value="Kerala">Kerala</option>
      <option value="MadhyaPradesh">Madhya Pradesh</option>
      <option value="Maharashtra">Maharashtra</option>
      <option value="Manipur">Manipur</option>
      <option value="Meghalaya">Meghalaya</option>
      <option value="Mizoram">Mizoram</option>
      <option value="Nagaland">Nagaland</option>
      <option value="Odisha">Odisha</option>
      <option value="Punjab">Punjab</option>
      <option value="Rajasthan">Rajasthan</option>
      <option value="Sikkim">Sikkim</option>
      <option value="TamilNadu">Tamil Nadu</option>
      <option value="Telangana">Telangana</option>
      <option value="Tripura">Tripura</option>
      <option value="UttarPradesh">Uttar Pradesh</option>
      <option value="Uttarakhand">Uttarakhand</option>
      <option value="WestBengal">West Bengal</option>
    </select>
    @error('state')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Registration Date</label>
    <input type="text" id="calendar" class="form-control"  placeholder="Select date" aria-describedby="emailHelp" name="rdate" value="{{old('rdate')}}">
    @error('rdate')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>  
  <div class="mb-3">  
    <label class="form-label">
      <input type="hidden" name="terms" value="0">
      <input type="checkbox" id="terms" name="terms" value="1"> I agree to the <a href="/terms-and-conditions" target="_blank">Terms and Conditions</a>
    </label>
    @error('terms')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>  
  <div class="mb-3">
    <label class="form-label">
      <input type="hidden" name="newsletter" value="0">
      <input type="checkbox" id="newsletter" name="newsletter" value="1"> Subscribe to our newsletter
    </label>
    @error('newsletter')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">
      <input type="hidden" name="promotions" value="0">
      <input type="checkbox" id="promotions" name="promotions" value="1"> Receive promotional emails
    </label>
    @error('promotions')<x-message-component msg={{$message}} cls="danger"/>@enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#calendar", {
            dateFormat: "d/m/Y"
        });
    </script>
@include('footer')