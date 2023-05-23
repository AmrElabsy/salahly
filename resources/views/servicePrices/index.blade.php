@extends("layouts.app")
@section("title", __("titles.servicePrices"))

@section("content")
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>{{ __("titles.servicePrice") }}</h2>
        <div>
			<a href="{{ route("servicePrice.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
			<a href="{{route('servicePrice.deleted')}}" class="btn btn-secondary">{{ __("titles.deleted_servicePrices") }}</a>

		</div>
    </div>

    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __("titles.services") }}</th>
                    <th>{{ __("titles.price") }}</th>
                    <th>{{ __("titles.start_date") }}</th>
                    <th>{{ __("titles.manage") }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicePrices as $i => $servicePrice)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{$servicePrice->service->name}}</td>
                    <td>{{$servicePrice->price}}</td>
                    <td>{{$servicePrice->start_date}}</td>
                    <td>
                        <a href="{{ route("servicePrice.edit", $servicePrice->id) }}"
                            class="btn btn-primary">{{ __("titles.edit") }}</a>
                        @include("layouts.delete", ["action" => route("servicePrice.destroy", $servicePrice->id)])
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
