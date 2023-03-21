<?php

return [

    /*
     * This Your include key clinet id
     */
    'aol_client_id' => env('AOL_CLIENT_ID'),

    /*
     * This Your include key clinet secret
     */
    'aol_client_secret' => env('AOL_CLIENT_SECRET'),

    /*
     * This Your url redirect, you can register in developer area accurate
     */
    'aol_redirect_url' => env('AOL_REDIRECT_URL'),

    /*
     * This Your include type response  ('code' or 'token')
     */
    'aol_type_response' => env('AOL_TYPE_RESPONSE', 'code')

];
