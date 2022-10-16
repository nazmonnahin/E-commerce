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
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <base href="/public">
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="frontend/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="frontend/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="frontend/css/responsive.css" rel="stylesheet" />

      <style>
        .class{
            margin: auto;
            text-align: center;
        }
        .img{
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }
        .imgtd{
            display: flex;
            justify-content: center;
        }
        .total_peg{
            font-size: 20px;
            padding: 40px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('frontend.header')
         <!-- end header section -->
        
  
        <div class="container" style="padding-top: 100px; padding-bottom: 150px;">
            <div class="class">
                <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    <?php
                    $totalprice = 0 ;
                    ?>
                    @foreach ($cart as $item)

                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->product_title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td class="imgtd">
                        <img class="img" src="product_image/{{ $item->image }}" alt="">
                    </td>
                    <td>
                        <a href="{{ url('remove_cart', $item->id) }}" class="btn btn-danger">Remove</a>
                    </td>
                    
                  </tr>
                  <?php 
                  $totalprice = $totalprice + $item->price
                  ?>
                  @endforeach
                </tbody>
              </table>

              <div>
                <h1 class="total_peg">Total Price : {{ $totalprice }}</h1>
              </div>

              <div>
                <h1 class="total_peg">Procced to Order </h1>
                <a href="{{ url('cash_order') }}" class="btn btn-info">Cash on Delivery </a>

                <a href="{{ url('stripe', $totalprice) }}" class="btn btn-warning">Pay using Card </a>
              </div>
            </div>
        </div>

      
      <!-- footer start -->
         @include('frontend.footer')
      
      <!-- jQery -->
      <script src="frontend/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="frontend/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="frontend/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="frontend/js/custom.js"></script>
   </body>
</html>