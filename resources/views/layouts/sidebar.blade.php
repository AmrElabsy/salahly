<div class="vertical-menu">

	<div data-simplebar class="h-100">

		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu">
				<li class="menu-title">Main</li>

				@if(Auth()->user())
					<li>
						<a href="{{ route("home") }}" class="waves-effect">
							<i class="mdi mdi-view-dashboard"></i>
							<span> {{ __("titles.home") }} </span>
						</a>
					</li>

					<li>
						<a href="{{ route("attendance.index") }}" class="waves-effect">
							<i class="mdi mdi-account-group"></i>
							<span> {{ __("titles.attendance") }} </span>
						</a>
					</li>

					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="mdi mdi-buffer"></i>
							<span>Users</span>
						</a>

						<ul class="sub-menu" aria-expanded="false">
							<li>
								<a href="{{ route("user.index") }}" class="waves-effect">
									<i class="mdi mdi-account-group"></i>
									<span> {{ __("titles.users") }} </span>
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
						</ul>
					</li>

					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="mdi mdi-buffer"></i>
							<span>Problems</span>
						</a>
						<ul class="sub-menu" aria-expanded="false">
							<li>
								<a href="{{ route("problem.index") }}" class="waves-effect">
									<i class="mdi mdi-account-group"></i>
									<span> {{ __("titles.problems") }} </span>
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
								<a href="{{ route("supply.index") }}" class="waves-effect">
									<i class="mdi mdi-account-group"></i>
									<span> {{ __("titles.supplies") }} </span>
								</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="mdi mdi-buffer"></i>
							<span>Manage</span>
						</a>

						<ul class="sub-menu" aria-expanded="false">
							<li>
								<a href="{{ route("branch.index") }}" class="waves-effect">
									<i class="mdi mdi-account-group"></i>
									<span> {{ __("titles.branches") }} </span>
								</a>
							</li>

							<li>
								<a href="{{ route("word.index") }}" class="waves-effect">
									<i class="mdi mdi-account-group"></i>
									<span> {{ __("titles.words") }} </span>
								</a>
							</li>

							<li>
								<a href="{{ route("role.index") }}" class="waves-effect">
									<i class="mdi mdi-account-group"></i>
									<span> {{ __("titles.roles") }} </span>
								</a>
							</li>

							<li>
								<a href="{{ route("permission.index") }}" class="waves-effect">
									<i class="mdi mdi-account-group"></i>
									<span> {{ __("titles.permissions") }} </span>
								</a>
							</li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>
