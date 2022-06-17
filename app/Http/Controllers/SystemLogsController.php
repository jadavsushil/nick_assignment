<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SystemLogsController extends Controller
{
    public function showLogs(Request $request)
    {
        if (getClientIp() == config('constants.debug_ip') || getClientIp() == '127.0.0.1') {
            $pathFile = storage_path('logs/laravel.log');
            if (File::exists($pathFile)) {
                if ($request->clear) {
                    file_put_contents($pathFile, "Logs\n");
                }
                return response(File::get($pathFile))->header('Content-Type', 'text/plain');
            }
        }
        return abort(404);
    }
}
