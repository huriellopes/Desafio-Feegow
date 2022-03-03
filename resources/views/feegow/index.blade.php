@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2 class="text-uppercase">{{ __('feegow.specialties') }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('feegow.store') }}" method="POST" id="professional">
                @csrf
                <div class="form-row">
                    <div class="input-group">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="specialty_id">
                                <option selected disabled>Selecione uma especialidade</option>
                            </select>
                            <label for="floatingInput" class="mr-2">Especialidades</label>
                        </div>
                        <button class="btn btn-outline-success" id="getProfessional" type="submit">{{ __('feegow.form.search') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('/feegow/js/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/Speciality/speciality.script.js') }}"></script>
@stop
