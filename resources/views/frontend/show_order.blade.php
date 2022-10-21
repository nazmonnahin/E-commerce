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
        .div_center{
        text-align: center;
        padding-top: 40px;
        
    }
    .h2_font{
        font-size: 40px;
        padding-bottom: 100px;
    }
    .h1_font{
        font-size: 40px;
        padding-bottom: 60px;
    }
    #btn_color{
        background-color: rgb(29, 34, 34)
    }
      </style>


   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('frontend.header')
         <!-- end header section -->
       <div class="container">
        <div class="container col-12">
            <div class=" col-12">
                <div class="div_center">
                    <h2 class="h1_font">Order List</h2>
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Title</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Product Photo</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->price }}</td>
                                <td>
                                    <img style="height:70px" src="product_image/{{ $order->image }}" alt="">
                                </td>
                                <td>
                                    {{-- <a class="btn btn-info" href="">Edit</a> --}}
                                    <a class="btn btn-danger onclick="return confirm('Are you sure?')"" href="{{ url('delete_order',$order->id) }}">Cancel</a>
                                </td>
                              </tr>  
                            @endforeach

                        </tbody>
                      </table>
                   
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