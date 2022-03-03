@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2 class="text-uppercase">{{ __('feegow.schedules') }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-hover table-striped datatables" id="schedulesTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Nascimento</th>
                        <th>Agendado em</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('/feegow/js/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/Schedule/schedules.script.js') }}"></script>
@stop
