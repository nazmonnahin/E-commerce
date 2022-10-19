<base href="/public">
@include('admin.header_link')

<style>
    label{
        display: inline-block;
        width: 300px;
    }
</style>


    <body class="sb-nav-fixed">
        @include('admin.navbar')
        <div id="layoutSidenav">
            @include('admin.sidebar')

            <div id="layoutSidenav_content">

                <main>
                    <div class="container">
                        <h1 style="text-align: center; font-size:25px;">Send Email to {{ $order->email }}</h1>

                        <form action="{{ url('send_notification', $order->id) }}" method="POST">
                            @csrf

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Greeting :</label>
                                <input type="text" name="greeting">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Firstline :</label>
                                <input type="text" name="firstline">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Body :</label>
                                <input type="text" name="body">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Button Name :</label>
                                <input type="text" name="button">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Url :</label>
                                <input type="text" name="url">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Lastline</label>
                                <input type="text" name="lastline">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px;">
                                <input style="background: black" type="submit" value="Send Email" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </main>

            </div>
            
        </div>

@include('admin.footer_link')
    </body>
</html>

