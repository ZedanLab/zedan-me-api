<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/laravel-hashids
 */

use App\Models\Media;
use App\Models\Testimonial;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
     */

    'default'     => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
     */

    'connections' => [
        Testimonial::class => [
            'salt'   => Testimonial::class.'DjXLuDiMMJ41FmrrOw6ySEFlagdt29dBYElyj1uz7Pf4rKoKzg',
            'length' => 20,
        ],
        Media::class       => [
            'salt'   => Media::class.'VfaF3i8ymgontSlikowBB4pS4NxMKWBgg4mSdr4GGtZMqKpl5r',
            'length' => 20,
        ],
    ],
];
