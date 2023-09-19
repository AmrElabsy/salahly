@extends("layouts.app")
@section("title", __("titles.today"))

@section("content")
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>{{ __("titles.materials") }}</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __("titles.material") }}</th>
                    <th>{{ __("titles.buying_date") }}</th>
                    <th>{{ __("titles.amount") }}</th>
                    <th>{{ __("titles.price") }}</th>
                    <th>{{ __("titles.manage") }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($materials as $i => $material)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $material->material->name }}</td>
                        <td>{{ $material->buying_date }}</td>
                        <td>{{ $material->amount }}</td>
                        <td>{{ $material->price }}</td>
                        <td>
                            @can("edit stored_material")
                                <a href="{{ route("stock.material.edit", $material->id) }}"
                                   class="btn btn-primary">{{ __("titles.edit") }}</a>
                            @endcan
                            @can("delete stored_material")
                                @include("layouts.delete", ["action" => route("stock.material.destroy", $material->id)])
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-5">
            <h2>{{ __("titles.supplies") }}</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __("titles.supply") }}</th>
                    <th>{{ __("titles.buying_date") }}</th>
                    <th>{{ __("titles.amount") }}</th>
                    <th>{{ __("titles.price") }}</th>
                    <th>{{ __("titles.manage") }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($supplies as $i => $supply)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $supply->supply->name }}</td>
                        <td>{{ $supply->buying_date }}</td>
                        <td>{{ $supply->amount }}</td>
                        <td>{{ $supply->price }}</td>
                        <td>
                            @can("edit stored_supply")
                                <a href="{{ route("stock.supply.edit", $supply->id) }}"
                                   class="btn btn-primary">{{ __("titles.edit") }}</a>
                            @endcan
                            @can("delete stored_supply")
                                @include("layouts.delete", ["action" => route("stock.supply.destroy", $supply->id)])
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
