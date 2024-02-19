<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsrfController extends Controller
{
    public function getCsrfToken(Request $request)
    {
        // Добавьте эту строку, чтобы увидеть, что происходит
        //Log::info('Request for CSRF token received');

        return response()->json(['csrf_token' => csrf_token()]);
    }

}
