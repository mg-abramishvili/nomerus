<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        '/api/admin/certificates/add_image_upload',
        '/api/admin/gallery/add_image_upload',
        '/api/admin/services/add_image_upload',
        '/api/admin/partners/add_image_upload',
    ];
}
