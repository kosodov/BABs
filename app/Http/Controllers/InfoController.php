<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function serverInfo()
    {
        return response()->json([
            'php_version' => phpversion()
        ]);
    }

    public function clientInfo(Request $request)
    {
        return response()->json([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
    }

    public function databaseInfo()
    {
        // Получение информации о базе данных
        $tables = DB::select('SHOW TABLES');

        // Форматирование данных
        $tableNames = [];
        foreach ($tables as $table) {
            foreach ($table as $key => $value) {
                $tableNames[] = $value;
            }
        }

        return response()->json([
            'database_info' => [
                'tables' => $tableNames,
            ]
        ]);
    }
}
