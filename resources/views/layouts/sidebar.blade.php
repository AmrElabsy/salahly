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
					@can("show attendance")
						<li>
							<a href="{{ route("attendance.index") }}" class="waves-effect">
								<i class="mdi mdi-account-group"></i>
								<span> {{ __("titles.attendance") }} </span>
							</a>
						</li>
					@endcan

					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="mdi mdi-buffer"></i>
							<span>Users</span>
						</a>

						<ul class="sub-menu" aria-expanded="false">
							@can("show user")
								<li>
									<a href="{{ route("user.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.users") }} </span>
									</a>
								</li>
							@endcan

							@can("show customer")
								<li>
									<a href="{{ route("customer.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.customers") }} </span>
									</a>
								</li>
							@endcan

							@can("show user")
								<li>
									<a href="{{ route("employee.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.employees") }} </span>
									</a>
								</li>
							@endcan

						</ul>
					</li>

					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="mdi mdi-buffer"></i>
							<span>Problems</span>
						</a>
						<ul class="sub-menu" aria-expanded="false">
							@can("show problem")
								<li>
									<a href="{{ route("problem.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.problems") }} </span>
									</a>
								</li>
							@endcan

							@can("show device")
								<li>
									<a href="{{ route("device.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.devices") }} </span>
									</a>
								</li>
							@endcan

							@can("show category")
								<li>
									<a href="{{ route("category.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.categories") }} </span>
									</a>
								</li>
							@endcan

							@can("show status")
								<li>h
									<a href="{{ route("status.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.statuses") }} </span>
									</a>
								</li>
							@endcan

						</ul>
					</li>

					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="mdi mdi-buffer"></i>
							<span>Stock Management</span>
						</a>

						<ul class="sub-menu" aria-expanded="false">
							@can("show stored_supply")
								<li>
									<a href="{{ route("stock.supply.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.supplies") }} </span>
									</a>
								</li>
							@endcan

							@can("show stored_material")
								<li>
									<a href="{{ route("stock.material.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.materials") }} </span>
									</a>
								</li>
							@endcan

							@can("show supply_return")
								<li>
									<a href="{{ route("stock.supplyreturn.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.supply_returns") }} </span>
									</a>
								</li>
							@endcan

							@can("show material_return")
								<li>
									<a href="{{ route("stock.materialreturn.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.material_returns") }} </span>
									</a>
								</li>
							@endcan

							@can("show material_waste")
								<li>
									<a href="{{ route("stock.materialwaste.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.material_wastes") }} </span>
									</a>
								</li>
							@endcan


						</ul>
					</li>

					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="mdi mdi-buffer"></i>
							<span>Manage</span>
						</a>

						<ul class="sub-menu" aria-expanded="false">
							@can("show branch")
								<li>
									<a href="{{ route("branch.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.branches") }} </span>
									</a>
								</li>
							@endcan

							@can("manage money")
								<li>
									<a href="{{ route("money.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.manage_money") }} </span>
									</a>
								</li>
							@endcan

							@can("show material")
								<li>
									<a href="{{ route("material.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.materials") }} </span>
									</a>
								</li>
							@endcan

							@can("show supply")
								<li>
									<a href="{{ route("supply.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.supplies") }} </span>
									</a>
								</li>
							@endcan

							@can("show service")
								<li>
									<a href="{{ route("service.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.services") }} </span>
									</a>
								</li>
							@endcan

							@can("show holiday")
								<li>
									<a href="{{ route("holiday.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.holidays") }} </span>
									</a>
								</li>
							@endcan

							@can("show feedback")
								<li>
									<a href="{{ route("feedback.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.feedbacks") }} </span>
									</a>
								</li>
							@endcan

							@can("show word")
								<li>
									<a href="{{ route("word.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.words") }} </span>
									</a>
								</li>
							@endcan

							@can("show role")
								<li>
									<a href="{{ route("role.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.roles") }} </span>
									</a>
								</li>
							@endcan

							@can("show permission")
								<li>
									<a href="{{ route("permission.index") }}" class="waves-effect">
										<i class="mdi mdi-account-group"></i>
										<span> {{ __("titles.permissions") }} </span>
									</a>
								</li>
							@endcan
						</ul>
					</li>
				@endif
			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>
