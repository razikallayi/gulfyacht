<div class="container">      
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('project/images/logo.png')}}" class="logo" alt=""></a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="button-wrap"><button data-dialog="somedialog" class="sear"><i class="fa fa-search"></i></button></div>
            <ul class="nav navbar-nav navbar-right">

                <li><a class="link link--surinami" href="{{url('/')}}"><span data-letters-l="Ho" data-letters-r="me">Home</span></a></li>                    
                <li class="dropdown"><a class="link link--surinami dropdown-toggle" href="#" data-toggle="dropdown"><span data-letters-l="Boa" data-letters-r="ts">Boats</span></a>
                <ul class="dropdown-menu">
                        <li><a href="{{url('boats/new')}}">New Boats</a></li>
                        <li><a href="{{url('boats/used')}}">Used Boats</a></li>
                    </ul>
                </li>
                <li><a class="link link--surinami" href="{{url('boats/buy')}}"><span data-letters-l="inventory" data-letters-r="">inventory</span></a></li>
                <li><a class="link link--surinami" href="{{url('boats/sell')}}"><span data-letters-l="Sell Your" data-letters-r="Boats">Sell Your Boats</span></a></li>
                <li><a class="link link--surinami" href="{{url('about')}}"><span data-letters-l="About" data-letters-r="us">About Us</span></a></li>
                <li><a class="link link--surinami" href="{{url('contact')}}"><span data-letters-l="Contact" data-letters-r="Us">Contact Us</span></a></li>
            </ul>
            
            
        </div>
    </div>
    