<base href="/public">
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
        <base href="/public">
        @include('admin.navbar')
        <div id="layoutSidenav">
            @include('admin.sidebar')

            <div id="layoutSidenav_content">

                <main>          
                    <div class="container col-12" >
                        <div class="col-6">
                            <div class="div_center">
                                <h2 class="h2_font">Update Product</h2>
                            </div>
                        </div>

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                    
                                {{ session()->get('message') }}
                    
                            </div>
                         @endif

                        <div class="col-6">
                        <form action="{{ url('update_product',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label>Title</label>
                              <input name="title" type="text" class="form-control" placeholder="Write Title" value="{{ $product->title }}">
                            </div>

                            <div class="form-group">
                              <label>Description</label>
                              <input name="description" type="text" class="form-control" placeholder="Write Description" value="{{ $product->description }}">
                            </div>
                            <br>
                            <div class="form-group">
                              <label >Old Photo</label>
                              <br>
                              <img style="width:70px" src="product_image/{{ $product->image }}" alt="">
                            </div>
                            <br>
                            <div class="form-group">
                              <label >Change Photo</label>
                              <br>
                              <input type="file" name="file">
                            </div>
                            <br>
                            <div class="form-group">
                              <label>Category</label>
                              <select class="form-control" name="category">
                                <option value="{{ $product->category }}" selected="">{{ $product->category }}</option>
                                @foreach ($category as $item)
                                <option>{{ $item->category_name }}</option>                                  
                                @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Quantity</label>
                              <input name="quantity" type="number" class="form-control" placeholder="Write Title" value="{{ $product->quantity }}">
                            </div>

                            <div class="form-group">
                              <label>Price</label>
                              <input name="price" type="number" class="form-control" placeholder="Write Title" value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                              <label>Discount Price</label>
                              <input name="discount_price" type="number" class="form-control" placeholder="Write Title" value="{{ $product->discount_price }}">
                            </div>

                            
                            <button id="btn_color" type="submit" class="btn btn-primary" style="margin-top: 10px">Update Product</button>
                          </form>
                        </div>
                    </div>


                </main>

            </div>
            
        </div>

@include('admin.footer_link')
    </body>
</html>
