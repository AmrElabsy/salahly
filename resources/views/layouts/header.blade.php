<header id="page-topbar">
	<div class="navbar-header">
		<div class="d-flex">
			<!-- LOGO -->
			<div class="navbar-brand-box">
				<a href="{{ route("home") }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset("assets/images/logo.png") }}" alt="" height="22">
                                </span>
					<span class="logo-lg">
                                    <img src="{{ asset("assets/images/logo.png") }}" alt="" height="17">
                                </span>
				</a>

				<a href="{{ route("home") }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset("assets/images/logo.png") }}" alt="" height="22">
                                </span>
					<span class="logo-lg">
                                    <img src="{{ asset("assets/images/logo.png") }}" alt="" height="48">
                                </span>
				</a>
			</div>

			<button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
				<i class="mdi mdi-menu"></i>
			</button>

			<div class="d-none d-sm-block ml-2">
				<h4 class="page-title">Dashboard</h4>
			</div>
		</div>

		<div class="d-flex">
			<div class="dropdown d-none d-md-block mr-2">
				<button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
					<span class="font-size-16"> {{ LaravelLocalization::getCurrentLocaleName() }} </span>
				</button>
				<div class="dropdown-menu dropdown-menu-right">
					@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
						<a rel="alternate" hreflang="{{ $localeCode }}" class="dropdown-item notify-item"
						   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
							{{ $properties['native'] }}
						</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</header>