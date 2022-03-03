@extends('layout.app')

@section('content')
    <div class="row mt-2 mb-2">
        <div class="col">
            <h2 class="text-uppercase">{{ __('feegow.professionals') }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col qtdProfessionals"></div>
    </div>

    <div class="row professionals">
    </div>
@stop

@section('js')
    <script>
        let specialty_id = {{ $specialty_id }};
        let csrf = "{{ csrf_token() }}";
        let routeURL = "{{ route('schedules/store') }}";
    </script>
    <script src="{{ asset('/feegow/js/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/Professionals/professional.script.js') }}"></script>
@stop
