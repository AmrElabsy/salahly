@extends("layouts.app")
@section("title", __("titles.supplies"))

@section("content")
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>{{ __("titles.supplies") }}</h2>
        <div>
			<a href="{{ route("supply.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
			<a href="{{ route("supply.deleted") }}" class="btn btn-secondary">{{ __("titles.deleted_supplies") }}</a>

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
                    <th>{{ __("titles.manage") }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supplies as $i => $supply)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $supply->name }}</td>
                    <td>{{ $supply->price }}</td>
                    <td>
                        <a href="{{ route("supply.edit", $supply->id) }}"
                            class="btn btn-primary">{{ __("titles.edit") }}</a>
                        @include("layouts.delete", ["action" => route("supply.destroy", $supply->id)])
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
