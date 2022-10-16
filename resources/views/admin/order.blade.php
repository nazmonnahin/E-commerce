@include('admin.header_link')

<style>
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

    <body class="sb-nav-fixed">
        @include('admin.navbar')
        <div id="layoutSidenav">
            @include('admin.sidebar')

            <div id="layoutSidenav_content">

                <main>
                    <div class="container col-12">
                        <div class=" col-12">
                            <div class="div_center">
                                <h2 class="h1_font">Order List</h2>
                                
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Product Title</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($data as $product)
                                      <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->email }}</td>
                                        <td>{{ $product->phone }}</td>
                                        <td>{{ $product->address }}</td>
                                        <td>{{ $product->product_title }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <img style="height:70px" src="/product_image/{{ $product->image }}" alt="">
                                        </td>
                                        <td>{{ $product->payment_status }}</td>
                                        <td>{{ $product->delivery_status }}</td>
                                        <td>
                                            <a class="btn btn-danger onclick="return confirm('Are you sure?')"" href="{{ url('delete_product',$product->id) }}">Delete</a>
                                        </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                               
                        </div>
                    </div>
                </main>

            </div>
            
        </div>

@include('admin.footer_link')
    </body>
</html>