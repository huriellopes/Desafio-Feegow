@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2 class="text-uppercase">{{ __('feegow.form.schedule') }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('schedules.store') }}" method="POST" id="formScheduleSend">
                @csrf
                <input type="hidden" id="specialty_id" name="specialty_id" value="{{ $specialty_id }}" />
                <input type="hidden" id="professional_id" name="professional_id" value="{{ $profissional_id }}" />

                <div class="row">
                    <div class="col form-group">
                        <label for="fullname" class="text-uppercase">{{ __('feegow.form.fullname') }}</label>
                        <input type="text" class="form-control" id="fullname" name="name" required />
                    </div>
                    <div class="col form-group">
                        <label for="sources" class="text-uppercase">{{ __('feegow.form.How did you meet?') }}</label>
                        <select name="source_id" id="sources" class="form-control" required>
                            <option selected disabled>Selecione</option>
                            @foreach ($sources["content"] as $source)
                                <option value="{{ $source["origem_id"] }}">{{ $source["nome_origem"] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label for="birthdate" class="text-uppercase">{{ __('feegow.form.birthdate') }}</label>
                        <input type="text" class="form-control" id="birthdate" name="birthdate" required />
                    </div>
                    <div class="col form-group">
                        <label for="cpf" class="text-uppercase">{{ __('feegow.form.cpf') }}</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required />
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col form-group align-content-end">
                        <button type="submit" class="btn btn-outline-success text-uppercase">{{ __('feegow.form.RequestSchedules') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('/feegow/js/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/Schedule/schedule.script.js') }}"></script>
@stop
