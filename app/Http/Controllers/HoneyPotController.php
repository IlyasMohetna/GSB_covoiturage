<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class HoneyPotController extends Controller
{
    public function __invoke(string $path = '')
    {
        $honeypot_paths_array = config('honeypot.paths', []);

        $honeypot_paths = '/^(' . str_replace(['.', '/'], ['\.', '\/'], implode('|', $honeypot_paths_array)) . ')/i';

        if (preg_match($honeypot_paths, $path)) {
            abort(Response::HTTP_I_AM_A_TEAPOT);
        }

        abort(Response::HTTP_NOT_FOUND);
    }
}
