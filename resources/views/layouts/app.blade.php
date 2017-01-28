<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body class="nav-md" >
    <div class="container body">
        <div class="main_container">
            @include('layouts.menu')
            <div class="right_col " role="main">
                @yield('content')
               
            
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/js/custom.js"></script>
    <!-- Script para hacer mas grande el icono --> 
    <script>
        var x=1;
        $("#menu_toggle").click(function(){
            if(x==1){
                $('#mainIcon').width(45);
                $('#mainIcon').height(45);
                x=0;
            }else
                if(x==0){
                    $('#mainIcon').width(30);
                    $('#mainIcon').height(30);
                    x=1;
                }
        }); 
    </script>
    @yield('scripts')
</body>
</html>
