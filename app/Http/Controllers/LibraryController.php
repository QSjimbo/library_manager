<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 以下を追加する
use App\Library;

class LibraryController extends Controller
{
    // indexメソッドに処理を追加していきます
    public function index()
    {
        $libraries = Library::all();

        return view("library.index", ["libraries" => $libraries]);
    }
}
