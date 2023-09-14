<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsived style -->
      <link href="css/responsive.css" rel="stylesheet" />
      <style>
        .center
        {
            margin:auto;
            width: 50%;
            text-align: center;
            padding: 40px;

        }
        table,th,td
        {
            border: 1px solid grey;
        }
        .td_deg
        {
            font-size: 25px;
            padding: 5px;
            background-color: skyblue;
            
        }
        .img_deg{
            width: 100px;
            height: 100px;
        }
        .total_deg 
        {
            font-size: 24px;
            padding: 40px;
        }
      
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
       
        @if(session()->has('message'))
                    <div class="alert alert-success">
                     {{session()->get('message')}}
                    </div>
                    @endif  


     <div class="center">
        <table>
            <tr>
                <th class="td_deg">Products Title</th>
                <th class="td_deg">Product Quantity</th>
                <th class="td_deg">Price</th>
                <th class="td_deg">Image</th>
                <th class="td_deg">Action</th>
            </tr>
            <?php $totoleprice = 0;  ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>${{$cart->price}}</td>
                <td class="img_deg"> <img src="/products/{{$cart->image}}" alt=""> </td>
                <td> <a href="{{url('remove_cart',$cart->id)}}" onclick="return confirm('Are you sure remove this products')" class="btn btn-primary">Remove</a> </td>
            </tr>
            <?php $totoleprice = $totoleprice + $cart->price ?>
            @endforeach

        </table>
        <div class="">
       <h1 class="total_deg"> Total Price: ${{$totoleprice }} </h1>
        </div>

        <div>
            <h1 style="font-size: 25px; padding-bottom:10px;">Proceed to Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on Delivery</a>
            <a href="{{url('stripe')}}" class="btn btn-danger">Pay using Card</a>
        </div>
     </div>
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>