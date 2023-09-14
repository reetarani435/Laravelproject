<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style>
    .center
    {
        margin:auto;
        width: 80%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }
    .font_size
    {
        font-size: 35px;
        text-align: center;
    }
    .img_size
    {
        height: 100px;
        width: 100px;
    }
    .th_class
    {
        background-color: green;
        padding: 20px;
    }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
                <div class="content-wrapper">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                     {{session()->get('message')}}
                    </div>
                    @endif
                <h3 class="font_size">Add Product</h3>
                    <table class="center">
                        <tr class="th_class">
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Catagory</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Products Image</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($product as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->catagory}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td> <img class="img_size" src="/products/{{$product->image}}" alt=""> </td>
                            <td> <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this products')" href="{{url('delete_product',$product->id)}}">Delete</a> </td>
                            <td> <a class="btn btn-success" href="{{url('edit_product',$product->id)}}">Edit</a> </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>