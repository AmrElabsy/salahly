@extends("layouts.app")
@section("title", __("titles.add_service"))

@section("content")
<form action="{{ route("service.store") }}" method="post">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">{{ __("titles.service") }}</label>
        <div class="col-sm-6">
            <input class="form-control @error("name") is-invalid @enderror" type="text" id="name" name="name" required
                minlength="2" value="{{ old("name") }}">
            @error("name")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="price1" class="col-sm-1 col-form-label">{{ __("titles.price") }}</label>
        <div class="col-sm-4">
            <input class="form-control @error("price.1") is-invalid @enderror" type="number" id="price1" name="prices[]"
                   required minlength="2" value="{{ old("price.1") }}">
            @error("price.1")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <label for="start_date1" class="col-sm-2 col-form-label">{{ __("titles.start_date") }}</label>
        <div class="col-sm-6 col-md-4">
            <input type="date" name="start_dates[]" id="start_date1" class="form-control">
            @error("start_dates.1")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-sm-1 col-md-1">
            <a href="#" class="remove_field btn btn-danger"><i class="fa fa-times-circle"></i></a>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Template for a single set of form fields -->
    @php $index = '__INDEX__'; @endphp
    <template id="form-fields">
        <div class="form-group row">
            <label for="price{{ $index }}" class="col-sm-1 col-form-label">{{ __("titles.price") }}</label>
            <div class="col-sm-4">
                <input class="form-control @error("price." . $index) is-invalid @enderror" type="number" id="price{{ $index }}" name="prices[]"
                       required minlength="2" value="{{ old("price." . $index) }}">
                @error("price.{{ $index }}")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <label for="start_date{{ $index }}" class="col-sm-2 col-form-label">{{ __("titles.start_date") }}</label>
            <div class="col-sm-6 col-md-4">
                <input type="date" name="start_dates[]" id="start_date{{ $index }}" class="form-control" value="{{ old("start_dates." . $index) }}">
                @error("start_dates." . $index )
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-sm-1 col-md-1">
                <a href="#" class="remove_field btn btn-danger"><i class="fa fa-times-circle"></i></a>
                <div class="clearfix"></div>
            </div>
        </div>

    </template>

    <!-- Wrapper for all the form fields -->
    <div class="input_fields_wrap"></div>

    <!-- Add button -->
    <a href="#" class="add_field_button btn btn-success"><i class="fa fa-plus"></i> Add More Fields</a>
    <input type="submit" class="btn btn-primary" value="{{__("titles.submit") }}">
</form>
@endsection

@section("script")
    <script>
        $(document).ready(function () {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            var x = 1; //initlal text box count

            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var template = $('template#form-fields').html();
                    template = template.replace(/__INDEX__/g, x);
                    $(wrapper).append(template); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parents('div.form-group').remove();
                x--;
            })
        });
    </script>
@endsection