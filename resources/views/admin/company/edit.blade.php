@php
$setting = App\Models\Utility::settings();
@endphp
<form method="post" action="{{ route('admin.company.update', $company->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        @if (isset($setting['is_enabled']) && $setting['is_enabled'] == 'on')
        <div class="float-end" style="margin-bottom: 15px">
            <a class="btn btn-primary btn-sm" href="#" data-size="md" data-ajax-popup-over="true" data-url="{{ route('generate',['company']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate') }}" data-title="{{ __('Generate Content with AI') }}"><i class="fas fa-robot"> {{ __('Generate with AI') }}</i></a>
        </div>
        @endif
        <div class="form-group col-md-6">
            <label class="form-label">{{ __('Name') }}</label>
            <div class="col-sm-12 col-md-12">
                <input type="text" placeholder="{{ __('Name of the company') }}" name="name"
                    class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $company->name }}"
                    autofocus>
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            </div>
        </div>

      
    </div>
  
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label"></label>
            <div class="col-sm-12 col-md-12 text-end">
                <button class="btn btn-primary btn-block btn-submit"><span>{{ __('Update') }}</span></button>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('public/libs/select2/dist/js/select2.min.js')}}"></script>

<script>
    if ($(".multi-select").length > 0) {
    $( $(".multi-select") ).each(function( index,element ) {
        var id = $(element).attr('id');
           var multipleCancelButton = new Choices(
                '#'+id, {
                    removeItemButton: true,
                }
            );
    });

}


if ($(".select2").length) {
        $('.select2').select2({
            "language": {
                "noResults": function () {
                    return "No result found";
                }
            },
        });
    }

</script>
