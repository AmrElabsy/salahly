@extends("layouts.app")
@section("title", __("titles.deleted_supplies"))

@section("content")
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>{{ __("titles.deleted_supplies") }}</h2>
        <div>
            <a href="{{ route("supply.index") }}" class="btn btn-success">{{ __("titles.supplies") }}</a>
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
                        <a href="{{ route("supply.restore", $supply->id) }}"
                            class="btn btn-primary">{{ __("titles.restore") }}</a>
                        <a href="{{ route("supply.forceDelete", $supply->id) }}"
                            class="btn btn-danger">{{ __("titles.delete") }}</a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
