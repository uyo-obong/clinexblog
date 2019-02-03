<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Clinex Admin
                </a>
            </div>

            <ul class="nav">
                <li class="{{ request()->is('admin') ? 'active' : ''}}">
                    <a href="{{ route('admin.view')}}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="{{ request()->is('list') ? 'active' : ''}}">
                    <a href="{{ route('show')}}">
                        <i class="ti-view-list-alt"></i>
                        <p>Post List</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>