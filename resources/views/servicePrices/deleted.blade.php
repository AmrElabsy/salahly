@extends("layouts.app")
@section("title", __("titles.deleted_servicePrices"))

@section("content")
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>{{ __("titles.deleted_servicePrices") }}</h2>
        <div>
            <a href="{{ route("servicePrice.index") }}" class="btn btn-success">{{ __("titles.servicePrices") }}</a>
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
                    <th>{{ __("titles.supplies") }}</th>
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
                        <a href="{{ route("servicePrice.restore", $servicePrice->id) }}"
                            class="btn btn-primary">{{ __("titles.restore") }}</a>
                        <a href="{{ route("servicePrice.forceDelete", $servicePrice->id) }}"
                            class="btn btn-danger">{{ __("titles.delete") }}</a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
