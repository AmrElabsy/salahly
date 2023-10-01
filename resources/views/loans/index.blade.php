@extends("layouts.app")
@section("title", __("titles.loans"))

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="d-flex justify-content-between">
        <h2>{{ __("titles.loans") }}</h2>
        <div>
            <a href="{{ route("loan.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>{{__('titles.employee')}}</th>
            <th>{{__('titles.quantity')}}</th>
            <th>{{__('titles.month')}}</th>
            <th>{{__('titles.manage')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->id }}</td>
                <td>{{ $loan->user->name }}</td>
                <td>{{ $loan->quantity }}</td>
                <td>{{ $loan->month }}</td>
                <td>
                    <a href="{{ route('loan.edit', $loan) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('loan.destroy', $loan) }}" method="POST"
                          style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this loan?')">Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
