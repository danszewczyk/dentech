<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
   		<!-- Brand and toggle get grouped for better mobile display -->
   		    <div class="navbar-header">
   		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
   		        <span class="sr-only">Toggle navigation</span>
   		        <span class="icon-bar"></span>
   		        <span class="icon-bar"></span>
   		        <span class="icon-bar"></span>
   		      </button>
   		      <a class="navbar-brand" href="#">dentech.io</a>
   		    </div>

   		    <!-- Collect the nav links, forms, and other content for toggling -->
   		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   		      <ul class="nav navbar-nav">
   		        <li class="active"><a href="{{ route('staff.home') }}">Home <span class="sr-only">(current)</span></a></li>  
			@if (Auth::check())
   		        <li><a href="{{ route('patients.index') }}">Patients</a></li>
   		        <li><a href="{{ route('staff.forms.index') }}">Forms</a></li>
   		    @endif
   		      </ul>
   		      
   		      <ul class="nav navbar-nav navbar-right">
   		        
   		     	@if (Auth::check())
   		        <li>

   		        	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
   		        	    Logout
   		        	</a>
   		        	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
   		        	    {{ csrf_field() }}
   		        	</form>
   		        </li>
   		        @else
				<li><a href="{{ route('login') }}">Log in</a></li>
				@endif

   		      </ul>
   		    </div><!-- /.navbar-collapse -->
	</div>
</nav>