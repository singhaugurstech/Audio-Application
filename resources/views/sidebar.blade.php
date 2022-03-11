
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">{{__('sidebar.logo')}}</span>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
				{{__('sidebar.pages')}}
				</li>
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="{{url('home')}}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">{{__('sidebar.dashboard')}}</span>
					</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{url('books')}}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">{{__('sidebar.books')}}</span>
					</a>
                </li>
				<li class="sidebar-item">
                    <a class="sidebar-link" href="{{url('category')}}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">{{__('sidebar.category')}}</span>
					</a>
                </li>
				<li class="sidebar-item">
				    <a class="sidebar-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{__('sidebar.content management')}}</span>
					</a>
                         <div class="dropdown-menu">
                                    <a href="{{url('about')}}" class="dropdown-item">{{__('sidebar.about content')}}</a>
                                    <a href="{{url('contact')}}" class="dropdown-item">{{__('sidebar.contact content')}}</a>
                          </div>               
                </li>
				<li class="sidebar-item">
				    <a class="sidebar-link" href="{{url('/users')}}"> 
					 <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">{{__('sidebar.user')}}</span>
                    </a>
                </li>
				<li class="sidebar-item">
				    <a class="sidebar-link" href="{{url('/advertisement')}}"> 
					 <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">{{__('sidebar.advertisement')}}</span>
                    </a>
                </li>
            </ul>
		</div>
	</nav>
    <div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                  <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
								    {{__('sidebar.notification')}}
								</div>
							</div>
						</li>
						<li class="nav-item dropdown"><a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown" ><span class="welcome">{{__('sidebar.welcome')}} {{ Auth::user()->name }}</span></a></li>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"></a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{url('profile')}}"><i class="align-middle me-1" data-feather="user"></i> {{__('sidebar.profile')}}</a>
								<div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<style>
				.welcome{
					font-size:14px
				}
			</style>