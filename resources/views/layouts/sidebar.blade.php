<div>
    <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
    alt="User Image"/>
</div>
<div>
    @if (Auth::guest())
    <p>InfyOm</p>
    @else
    <p>{{ Auth::user()->name}}</p>
    @endif
    <!-- Status -->
    <a href="#"><i></i> Online</a>
</div>
</div>
<form action="#" method="get" >
<div >
    <input type="text" name="q"  placeholder="Search..."/>
    <span class="input-group-btn">
        <button type='submit' name='search' id='search-btn'><i></i>
        </button>
    </span>
</div>
</form>
<ul>
@include('layouts.menuAdmin')
</ul>