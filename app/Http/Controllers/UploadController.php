<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Files\ExcelFile;

class UploadController extends Controller {

    public function getFile()
    {
        return storage_path('exports') . '/file.csv';
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }

}
