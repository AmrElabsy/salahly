@extends("layouts.app")
@section("title", __("titles.deleted_supplyPrices"))

@section("content")
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>{{ __("titles.deleted_supplyPrices") }}</h2>
        <div>
            <a href="{{ route("supplyPrice.index") }}" class="btn btn-success">{{ __("titles.supplyPrices") }}</a>
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
                @foreach($supplyPrices as $i => $supplyPrice)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{$supplyPrice->supply->name}}</td>
                    <td>{{$supplyPrice->price}}</td>
                    <td>{{$supplyPrice->start_date}}</td>

                    <td>
                        <a href="{{ route("supplyPrice.restore", $supplyPrice->id) }}"
                            class="btn btn-primary">{{ __("titles.restore") }}</a>
                        <a href="{{ route("supplyPrice.forceDelete", $supplyPrice->id) }}"
                            class="btn btn-danger">{{ __("titles.delete") }}</a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
