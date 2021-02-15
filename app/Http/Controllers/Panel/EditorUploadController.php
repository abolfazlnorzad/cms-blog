<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditorUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $func = $request->CKEditorFuncNum;
            $original_name = $file->getClientOriginalName();
            $base_name = pathinfo($original_name, PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' . $ext;
            $file->storeAs('images/posts', $file_name, 'public_files');
            $url = asset('images/posts/' . $file_name);
            $msg = 'تصویر با موفقیت آپلود شد !';
            return response("<script>window.parent.CKEDITOR.tools.callFunction($func, '$url', '$msg')</script>");
        }
    }
}
