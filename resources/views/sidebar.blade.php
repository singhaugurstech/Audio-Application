
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">Audio</span>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
				</li>
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="{{url('home')}}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
					</a>
                </li>
                <li class="sidebar-item">
				    <a class="sidebar-link dropdown-toggle" data-bs-toggle="dropdown" href="{{url('/books/')}}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Books</span>
					</a>
                         <div class="dropdown-menu">
                                    <a href="{{url('books')}}" class="dropdown-item">Book</a>
                                    <a href="{{url('book/create')}}" class="dropdown-item">Create Book</a>
                          </div>               
                </li>
				<li class="sidebar-item">
				    <a class="sidebar-link dropdown-toggle" data-bs-toggle="dropdown" href="{{url('/category/')}}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Category</span>
					</a>
                         <div class="dropdown-menu">
                                    <a href="{{url('category')}}" class="dropdown-item">Category</a>
                                    <a href="{{url('category/create')}}" class="dropdown-item">Create Category</a>
                          </div>               
                </li>
				<li class="sidebar-item">
				    <a class="sidebar-link dropdown-toggle" data-bs-toggle="dropdown" href="{{url('/about/')}}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">About Page</span>
					</a>
                         <div class="dropdown-menu">
                                    <a href="{{url('about')}}" class="dropdown-item">About</a>
                                    <a href="{{url('about/create')}}" class="dropdown-item">Create About Content</a>
                          </div>               
                </li>
				<li class="sidebar-item">
				    <a class="sidebar-link" href="{{url('/users')}}"> 
					 <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">User</span>
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
									4 New Notifications
								</div>
							</div>
						</li>
						<li class="nav-item dropdown"><a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown" ><span class="welcome">Welcome {{ Auth::user()->name }}</span></a></li>
				
						
							

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"></a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
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