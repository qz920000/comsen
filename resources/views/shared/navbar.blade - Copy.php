<nav class="navbar navbar-fixed-top navbar-default " role="navigation">

<!-- Brand and toggle get grouped for better mobile display <nav class="navbar navbar-default"> -->
  <!--<nav class="navbar navbar-inverse" role="navigation">-->
    <div class="container-fluid">
        <!-- add header -->
        <div class="navbar-header"> 
            <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> -->
            
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Common Sense Now</a>
        </div>
        
        <!-- add menu -->
       <!-- ================================================ ================================================-->
               <!-- Navbar Right 
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right"> -->
        <div class="collapse navbar-collapse navbar-right" id="navbar1">
            <ul class="nav navbar-nav">              
 
                     <!--    <li class="active"><a href={{ URL::route('home') }}>Home</a></li>
                        <li><a href={{ URL::route('about') }}>About</a></li>
                        <li><a href={{ URL::route('blog') }}>Blog</a></li>
                        <li><a href={{ URL::route('contact') }}>Contact</a></li>

                        <li class="{{ Request::is('/') ? 'active' : '' }}">
                            <a href={{ URL::route('home') }}>Home</a>
                        </li>
                        <li class="{{ Request::is('about') ? 'active' : '' }}">
                            <a href={{ URL::route('about') }}>About</a>
                        </li>
                     
                        <li class="{{ Request::is('blog') ? 'active' : '' }}">
                            <a href={{ URL::route('blog') }}>Blog</a>
                        </li>
                        <li class="{{ Request::is('contact') ? 'active' : '' }}">
                            <a href={{ URL::route('contact') }}>Contact Us</a>
                        </li>-->
                        
    <li class="{{ set_active('home') }}"><a href="{{ URL::route('home') }}">Home</a></li>
    <li class="{{ set_active('about') }}"><a href="{{ URL::route('about') }}">About</a></li>
     <li class="{{ set_active('blog') }}"><a href="{{ URL::route('blog') }}">Blog</a></li>
    <li class="{{ set_active('contact') }}"><a href="{{ URL::route('contact') }}">Contact Us</a></li>
<li class="{{ set_active('users/register') }}"><a href={{ URL::route('register') }}><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        
                        
                @if (Auth::check())
                    @if(Auth::user()->hasRole('manager'))
                        <li><a href={{ URL::route('adminhome') }}>Admin</a></li>
                        <li class="dropdown">
                        <a href="{{ URL::route('adminhome') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                                    <li><a href={{ URL::route('adminhome') }}>Admin Page</a></li>
                                 <li><a href="{{ URL::route('admin.user.index') }}">Users</a></li>
                                 <li><a href={{ URL::route('roles_home') }}>Roles</a></li>
                                 <li><a href={{ URL::route('post_home') }}>Posts</a></li>
                                 <li><a href={{ URL::route('category_home') }}>Categories</a></li>
                        </ul>
                        </li>
                    @endif
                @endif
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::check() ? Auth::user()->name : 'Guest'}} <span class="caret"></span></a>
                        
                 @if (Auth::check())
                         <ul class="dropdown-menu" role="menu">
                             
                                                      
 
    
                                <li><a href={{ URL::route('create_post') }}>Create a new post</a></li>
                                <li><a href={{ URL::route('mypost') }}>My Posts </a></li>
                                <li><a href={{ URL::route('mydraft') }}>My Drafts </a></li>
                                <li><a href={{ URL::route('mycomments') }}>My Comments</a></li>
                                <li><a href={{ URL::route('useredit',Auth::user()->id ) }}>Edit Profile</a></li>
                                <li><a href={{ URL::route('logout') }}> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name }}</a></li>
                         </ul>
                @else
                        <ul class="dropdown-menu" role="menu">
                                <li class="{{ set_active('Guest') }}">guest</li>                                                        
                             
    <li class="{{ set_active('users/register') }}"><a href={{ URL::route('register') }}><span class="glyphicon glyphicon-user"></span> Register</a></li>
     <li class="{{ set_active('users/login') }}"><a href={{ URL::route('login') }}><span class="glyphicon glyphicon-log-in"></span> Login</a></li>


                        </ul>
                @endif
                        </li>
                
            </ul>
<!-- ================================================-->

  
            <!-- add search form -->
            <form class="navbar-form navbar-right" role="search"  action={{ URL::route('search') }}>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search this site" name="searchtext">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</nav>






