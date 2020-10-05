<?php

namespace App\Http\Middleware;

use App\Models\Settings\Setting;
use Closure;
use Illuminate\Support\Facades\DB;

class AppSettings
{

    public function handle($request, Closure $next)
    {
        if (!session()->has('appSettings')) {
            $settings = Setting::latest()->first();
            if (!empty($settings)) {
                session()->put("appSettings", json_decode($settings));
            }
        }
        return $next($request);
    }
}
