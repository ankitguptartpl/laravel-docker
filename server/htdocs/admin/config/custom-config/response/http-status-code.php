<?php

return
    [
        'success'=>200,
        'success_with_no_content'=>204,
        'not_found'=>404,
        'internal_server_error'=>500,
        'unauthorized'=>401,
        'forbidden'=>403,
        'bad_request'=>400,
        'precondition_failed' => 400, //412
        'unprocessable_entity'=>422,
        'bad_gateway'=>502,
        'too_many_request' => 429,
        'already_logged_in' => 400
    ];
