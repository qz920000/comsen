


<div class="page-header"> </div>
 <div class="post-preview">    
<ul class="list-inline text-center ">

<li class="active"><a href={{ URL::route('blog') }}>Home</a></li>
<li><a href={{ URL::route('about') }}>About</a></li>
<li><a href={{ URL::route('contact') }}>Contact</a></li>

@if (Auth::check())
@if(Auth::user()->hasRole('manager'))
<li><a href={{ URL::route('adminhome') }}>Admin</a></li>
@endif
@endif

</ul>
 </div>









