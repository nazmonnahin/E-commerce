@include('admin.header_link')

<style>
    .div_center{
        text-align: center;
        padding-top: 20px;
        
    }
    .h2_font{
        font-size: 40px;
        padding-bottom: 20px;
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
                    <div class="container col-12" >
                        <div class="col-6">
                            <div class="div_center">
                                <h2 class="h2_font">Add Product</h2>
                            </div>
                        </div>

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                    
                                {{ session()->get('message') }}
                    
                            </div>
                         @endif

                        <div class="col-6">
                        <form action="{{ url('submit_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                              <label>Title</label>
                              <input name="title" type="text" class="form-control" placeholder="Write Title">
                            </div>

                            <div class="form-group">
                              <label>Description</label>
                              <br>
                              <textarea name="description" cols="40" rows="2"></textarea>
                            </div>

                            <div class="form-group">
                              <label >Product Photo</label>
                              <br>
                              <input type="file" name="file" class="form-control-file">
                            </div>

                            <div class="form-group">
                              <label>Category</label>
                              <select class="form-control" name="category">
                                <option>--Select--</option>
                                @foreach ($data as $item)
                                <option>{{ $item->category_name }}</option>                                  
                                @endforeach

                              </select>
                            </div>

                            <div class="form-group">
                              <label>Quantity</label>
                              <input name="quantity" type="number" class="form-control" placeholder="Write Title">
                            </div>

                            <div class="form-group">
                              <label>Price</label>
                              <input name="price" type="number" class="form-control" placeholder="Write Title">
                            </div>

                            <div class="form-group">
                              <label>Discount Price</label>
                              <input name="discount_price" type="number" class="form-control" placeholder="Write Title">
                            </div>

                            
                            <button id="btn_color" type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>
                          </form>
                        </div>
                    </div>


                </main>

            </div>
            
        </div>

@include('admin.footer_link')
    </body>
</html>