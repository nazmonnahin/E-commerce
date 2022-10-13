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
                    <div class="container col-12" style="display: flex">
                        <div class="col-6">
                            <div class="div_center">
                                <h2 class="h2_font">Add Category</h2>
    
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                    
                                    {{ session()->get('message') }}
                    
                                </div>
                                @endif
    
                                <form action="{{ url('add_category') }}" method="post" >
                                    @csrf
                                    <input type="text" name="category" placeholder="Write Category Name">
                                    <br>
                                    <br>
                                    <input id="btn_color" class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </form>
    
                            </div>
                        </div>
    
                        <div class=" col-6">
                            <div class="div_center">
                                <h2 class="h1_font">Category List</h2>
                                
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($data as $category)
                                      <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <a href="{{ url('delete_category',$category->id) }}" class="btn btn-danger" onclick="return confirm('are you sure ?')">Delete</a>
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