<?php

namespace App\Enum;

class ScheduleEnum
{
    //Messages
    const MESSAGE_BAD_LIST = 'Erro ao listar agendamentos.';
    const MESSAGE_BAD_REQUEST = 'Erro ao agendar.';
    const SUCCESS = 'Atendimento agendado com sucesso.';

    //Status
    const OK = 200;
    const CREATED = 201;
    const BAD_REQUEST = 400;
}
