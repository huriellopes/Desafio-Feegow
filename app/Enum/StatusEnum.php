<?php

namespace App\Enum;

class StatusEnum
{
    //Messages
    const MESSAGE_BAD_REQUEST = 'Error making the request.';
    const MESSAGE_UNAUTHORIZED = 'Not authorized.';
    const MESSAGE_NOT_FOUND = 'The server could not find the requested resource.';
    const MESSAGE_SERVER_ERROR = 'Server error processing request.';

    //Status
    const OK = 200;
    const CREATED = 201;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const NOT_FOUND = 404;
    const SERVER_ERROR = 500;
    const UNPROCESSABLE_ENTITY = 422;
}
