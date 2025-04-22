@include('header')
        </div>
    </div>
</div>
<div class="container">
  <form method="POST" action="{{url('/')}}/stock">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product</label>
      <select name="product" id="product_dropdown" class="form-control">
        <option value="" disabled {{ old( 'product' ) ? '' : 'selected' }}>Select a brand</option>
        @foreach($products as $product)
          <option value="{{$product->id}}">{{$product->product_name}}</option>
        @endforeach
      </select>
      @error('product')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    @csrf
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Product ID</label>
            <input type="email" class="form-control" id="productid"   disabled>
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Product Name</label>
            <input type="email" class="form-control" id="productname"   disabled>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Brand</label>
            <input type="email" class="form-control" id="brand"   disabled>
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Category</label>
            <input type="email" class="form-control" id="category"   disabled>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Wear Type</label>
            <input type="email" class="form-control" id="weartype"   disabled>
            <select name="weartype" id="weartype" class="form-control">
              @foreach($weartypes as $weartype)
                <option value="{{$weartype->id}}">{{$weartype->weartypes_name}}</option>
              @endforeach
            </select>  
            @error('weartype')<x-message-component msg={{$message}} cls="danger"/>@enderror
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Gender</label>
            <select name="gender" id="gender" class="form-control">
              <option value="" disabled {{old('genders') ? '' : 'selected' }}>Select a Gender</option>
              @foreach($genders as $gender)
                <option value="{{$gender->id}}" {{ old('gender') == $gender->id ? 'selected' : '' }}>{{$gender->gender_name}}</option>
              @endforeach
            </select>  
            @error('gender')<x-message-component msg={{$message}} cls="danger"/>@enderror            
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Color</label>
            <select name="color" id="color" class="form-control">
              <option value="" disabled {{old('color') ? '' : 'selected' }}>Select a color</option>
              @foreach($colors as $color)
                <option value="{{$color->id}}" {{ old('color') == $color->id ? 'selected' : '' }}>{{$color->color_name}}</option>
              @endforeach
            </select>  
            @error('color')<x-message-component msg={{$message}} cls="danger"/>@enderror            
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Size</label>
            <select name="size" id="size" class="form-control">
              <option value="" disabled {{old('sizes') ? '' : 'selected' }}>Select a size</option>
              @foreach($sizes as $size)
                <option value="{{$size->id}}" {{ old('size') == $size->id ? 'selected' : '' }}>{{$size->size_label}}</option>
              @endforeach
            </select>  
            @error('size')<x-message-component msg={{$message}} cls="danger"/>@enderror            
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Price</label>
            <input type="email" class="form-control" id="price"   disabled>
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Discount</label>
            <input type="email" class="form-control" id="discount"   disabled>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Description</label>
            <textarea name="description" rows="7" cols="50" type="textarea" class="form-control" id="description"  disabled></textarea>
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <label for="floatingInputGrid">Image</label>
            <img src="" alt="Sample Image" width="500" height="185" id="image" class="" disabled>
          </div>
        </div>
      </div>
    </div>


    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Quantity</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" name="quantity" value="{{old('quantity')}}">
      @error('quantity')<x-message-component msg={{$message}} cls="danger"/>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

  <script>
    $(document).ready(function () {
      //document.getElementById('product').addEventListener('change', function() {
        $('#product_dropdown').on('change', function () {
        const selectedValue = this.value;
        $.ajax({
          method: 'POST',
          url: '{{ url("/stock/select-product") }}',
          //dataType: 'application/json',
          data: {
            value: selectedValue
          },
          headers: {
              'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
          },
          success: function(response){
            try {
              console.log("Mitsubishi Lancer");
              //console.log(response.data['brand_name']);
//              const jsonResponse = json_decode(response); // Manually parse the response
             // const jsonResponse = JSON.parse(response);
              //console.log(jsonResponse);
              
              $("#productid").val(response.data['id']);
              $("#productname").val(response.data['product_name']);
              $("#brand").val(response.data['brand_name']);
              $("#category").val(response.data['category_name']);
              $("#weartype").val(response.data['weartypes_name']);
              $("#gender").val(response.data['gender_name']);
              $("#color").val(response.data['color_name']);
              $("#size").val(response.data['size_label']);
              $("#price").val(response.data['price']);
              $("#discount").val('On behalf of '+response.data['discount_label']+' and dicount is '+response.data['discount_percentage']+'%');
              $("#image").val(response.data['image_url']);
              const textarea = document.getElementById("description");
              textarea.value = response.data['description'];
              const imageElement = document.getElementById("image");
              const image = new Image();
              image.src = '{{ url("/img") }}/'+response.data['image_url']; 
              imageElement.src = image.src;
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
            /*console.error('Status:', status);
            console.error('Error:', error);
            console.log('Response Text in Error:', xhr.responseText); // Log the raw response
            console.log('XHR Object:', xhr); // Log the complete XHR object*/
          }
        });

        /*if(selectedValue){
          fetch('/stock/select-product', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({ value: selectedValue })
          })
          .then(response => {
            if(!response.ok){
              throw new Error('Network Error: '+response.statusText);
            }
            return response;
          })
          .then(data => {
            console.log('Response from server: ', data);
          })
          .catch(error => {
            console.error('Error:', error.message);
          });
        }*/
      });
    });
  </script>
@include('footer')