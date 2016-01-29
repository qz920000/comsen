<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Learning Laravel</a>
</div>
<!-- Navbar Right -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">


<li class="active"><a href={{ URL::route('home') }}>Home</a></li>
<li><a href={{ URL::route('about') }}>About</a></li>
<li><a href={{ URL::route('blog') }}>Blog</a></li>

<li><a href="/contact">Contact</a></li>
<li><a href="#"> {{Auth::check() ? Auth::user()->name : 'Account'}}</a></li>

<li><a href={{ URL::route('contact') }}>test</a></li>
@if (Auth::check())
@if(Auth::user()->hasRole('manager'))
<li><a href={{ URL::route('adminhome') }}>Admin</a></li>
@endif
@endif
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::check() ? Auth::user()->name : 'Guest'}} <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
    
   
    


@if (Auth::check())
@if(Auth::user()->hasRole('manager'))
<li><a href={{ URL::route('adminhome') }}>Admin</a></li>
@endif
<li><a href="#">My profile</a></li>
<li><a href={{ URL::route('home') }}>My Posts</a></li>
<li><a href="#">My Comments</a></li>
<li><a href={{ URL::route('logout') }}>Logout</a></li>
@else

<li>guest</li>
<li><a href="users/register">Register</a></li>
<li><a href={{ URL::route('login') }}>Login</a></li>

@endif

<li><hr></li>
<li><a href="/users/register">Register</a></li>
<li><a href="/users/login">Login</a></li>
</ul>
</li>
</ul>
</div>
</div>
</nav>