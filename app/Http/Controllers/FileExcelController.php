<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileExcelController extends Controller
{
      public function import(Request $request)
    {
          $this->validate($request,[
              'file' => 'required'
          ]);
        if(($handle = fopen($_FILES['file']['tmp_name'],'r')) != FALSE)
        {
            fgetcsv($handle);
        }
        while(($data = fgetcsv($handle,1000,",")) != FALSE)
        {
            echo $data[0];
            echo "<br>";
        }
        //return $request;
    }
}
