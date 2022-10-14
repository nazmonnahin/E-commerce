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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('frontend.header')
         <!-- end header section -->
        
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding: 30px">
         <div class="box">
            <div class="img-box">
               <img style="height: 300px" src="product_image/{{ $item->image }}" alt="">
            </div>
            <div class="detail-box">
               <h5>
                  {{ $item->title }}
               </h5>

                 @if ($item->discount_price !=null)
           
               <h6 style="text-decoration: line-through">
                 ${{ $item->price }}
               </h6>
               
               <h6>
                 ${{ $item->discount_price }}
               </h6>

               @else

               <h6>
                 ${{ $item->price }}
               </h6>

               @endif

               <h6>Product Category : {{ $item->price }}</h6>
               <h6>Product Details : {{ $item->description }}</h6>
               <h6>Available Quantity : {{ $item->quantity }}</h6>

               <a href="" class="btn btn-danger">Add to Cart</a>
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