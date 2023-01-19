<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CodeCheckerController extends Controller
{
    public function index()
    {
        return view('code-checker');
    }

    public function execute(Request $request)
    {
        $validatedData = $request->validate([
            'code' => [
                'required',
                'string',
                'max:2000',
                Rule::notIn(['system', 'exec', 'passthru', 'shell_exec', 'proc_open', 'popen']),
            ],
        ]);

        $code = $validatedData['code'];

        // simpan kode ke file
        $file = storage_path('app/code.c');
        file_put_contents($file, $code);

        // eksekusi kode C menggunakan passthru
        $output = '';
        passthru("gcc $file -o " . storage_path('app/code') . " 2>&1", $output);

        // jalankan hasil eksekusi
        if ($output === 0) {
            $output = shell_exec(storage_path('app/code'));
        }

        return view('code-checker', ['output' => $output]);
    }

}
