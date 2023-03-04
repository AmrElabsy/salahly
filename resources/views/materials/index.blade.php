@extends("layouts.app")
@section("title", __("titles.materials"))

@section("content")
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>{{ __("titles.materials") }}</h2>
        <div>
			<a href="{{ route("material.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
			<a href="{{ route("material.deleted") }}" class="btn btn-secondary">{{ __("titles.deleted_materials") }}</a>

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
                    <th>{{ __("titles.materials") }}</th>
                    <th>{{ __("titles.price") }}</th>
                    <th>{{ __("titles.manage") }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materials as $i => $material)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->price }}</td>
                    <td>
                        <a href="{{ route("material.edit", $material->id) }}"
                            class="btn btn-primary">{{ __("titles.edit") }}</a>
                        @include("layouts.delete", ["action" => route("material.destroy", $material->id)])
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection