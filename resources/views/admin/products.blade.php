<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            font-size: 30px;
            padding-top: 40px;
            padding-bottom: 30px;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
        .div_design
        {
            padding-bottom: 15px;
        }
        .text_color
        {
            color: black;
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
                    <div class="div_center">
                        <h2>Add Product's</h2>
                    </div>
                    <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label for="">Product tiltle</label>
                        <input class="text_color" type="text" name="title" placeholder="write a title" required>
                    </div>
                    <div class="div_design">
                        <label for="">Product Description :</label>
                        <input class="text_color" type="text" name="description" placeholder="write a description" required>
                    </div>
                    <div class="div_design">
                        <label for="">Product Price :</label>
                        <input class="text_color" type="text" name="price" placeholder="write a price">
                    </div>
                    <div class="div_design">
                        <label for="">Product Discount price  :</label>
                        <input class="text_color" type="text" name="discount" placeholder="write a discount price">
                    </div>
                    <div class="div_design">
                        <label for="">Product Quantity :</label>
                        <input class="text_color" type="text" name="quantity" placeholder="write a quantity">
                    </div>
                    <div class="div_design">
                        <label for="">Product Catagory :</label>
                        
                        <select name="catagory" class="text_color">
                            <option value="">--select catagory--</option>
                            @foreach( $catagory as  $catagory)
                            <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="div_design">
                        <label for="">Product Image :</label>
                        <input class="text_color" type="file" name="image">
                    </div>
                    <div class="div_design">
                        
                        <input type="submit" name="submit" placeholder="Add Products">
                    </div>
                    </form>
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