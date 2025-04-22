@include('header')
        </div>
    </div>
</div>
<div class="container">
<form method="POST" action="{{url('/')}}/sales">
      @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">User</label>
      <select name="user" id="user" value="{{old('user')}}">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
      </select>
      @error('user')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product</label>
      <select name="product" id="product" value="{{old('product')}}">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
      </select>
      @error('product')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Discount</label>
      <select name="discount" id="discount" value="{{old('discount')}}">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
      </select>
      @error('discount')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Quantity</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="quantity" value="{{old('quantity')}}">
      @error('quantity')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Actual Price</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="actualprice" value="{{old('actualprice')}}">
      @error('actualprice')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Sales Price</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="salesprice" value="{{old('salesprice')}}">
      @error('salesprice')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@include('footer')