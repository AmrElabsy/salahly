<div class="vertical-menu">

	<div data-simplebar class="h-100">

		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu">
				<li class="menu-title">Main</li>

				<li>
					<a href="#" class="waves-effect">
						<span class="badge badge-pill badge-primary float-right">20+</span>
						<i class="mdi mdi-view-dashboard"></i>
						<span> Dashboard </span>
					</a>
				</li>

				<li>
					<a href="{{ route("user.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.users") }} </span>
					</a>
				</li>

				<li>
					<a href="{{ route("problem.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.problems") }} </span>
					</a>
				</li>


				<li>
					<a href="{{ route("customer.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.customers") }} </span>
					</a>
				</li>

				<li>
					<a href="{{ route("employee.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.employees") }} </span>
					</a>
				</li>

				<li>
					<a href="{{ route("attendance.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.attendance") }} </span>
					</a>
				</li>

				<li>
					<a href="{{ route("branch.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.branches") }} </span>
					</a>
				</li>

				<li>
					<a href="{{ route("device.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.devices") }} </span>
					</a>
				</li>

				<li>
					<a href="{{ route("status.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.statuses") }} </span>
					</a>
				</li>

				<li>
					<a href="{{ route("material.index") }}" class="waves-effect">
						<i class="mdi mdi-account-group"></i>
						<span> {{ __("titles.materials") }} </span>
					</a>
				</li>

				<li>
					<a href="#" class="waves-effect">
						<i class="mdi mdi-view-dashboard"></i>
						<span> {{ __("titles.categories") }} </span>
					</a>
				</li>

				<li>
					<a href="#" class="waves-effect">
						<i class="mdi mdi-view-dashboard"></i>
						<span> {{ __("titles.products") }} </span>
					</a>
				</li>

				<li>
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="dripicons-network-1"></i>
						<span>Multi Level</span>
					</a>
					<ul class="sub-menu" aria-expanded="true">
						<li><a href="javascript: void(0);">Level 1.1</a></li>
						<li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
							<ul class="sub-menu" aria-expanded="true">
								<li><a href="javascript: void(0);">Level 2.1</a></li>
								<li><a href="javascript: void(0);">Level 2.2</a></li>
							</ul>
						</li>
					</ul>
				</li>

			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>
