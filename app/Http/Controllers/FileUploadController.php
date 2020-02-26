<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class FileUploadController extends Controller
{
    //
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            //'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('uploads'), $fileName);
   
        return [
            'status' => true,
            'msg' => '',
            'data' => $fileName
        ];
        // return back()
        //     ->with('success','You have successfully upload file.')
        //     ->with('file',$fileName);
    }
}
