@extends("layouts.app")
@section("title", __("titles.edit_servicePrice"))

@section("content")
	<form action="{{route('servicePrice.update',$servicePrice)}}" method="post">
		@csrf
		@method('PUT')
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">{{ __("titles.service") }}</label>
            <div class="col-sm-6">
                <select name="service" id="service" class="form-control">
                    @foreach($services as $service)
                        <option
                            @selected(old('service',$servicePrice->service->id) == $service->id)
                            value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">{{ __("titles.Price") }}</label>
            <div class="col-sm-6">
                <input class="form-control @error("price") is-invalid @enderror" type="number" id="price" name="price"
                       required minlength="2" value="{{ old("price", $servicePrice->price) }}">
                @error("price")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">{{ __("titles.StartDate") }}</label>
            <div class="col-sm-6">
                <input class="form-control @error("start_date") is-invalid @enderror" type="date" id="start_date" name="start_date"
                       required minlength="2" value="{{ old("start_date",$servicePrice->start_date) }}">
                @error("start_date")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="{{__("titles.submit") }}">
	</form>
@endsection
