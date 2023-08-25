<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Library;

class LibraryController extends Controller
{
    public function __construct()
    {
        $this -> middleware("auth");
    }
    // indexメソッドに処理を追加していきます
    public function index()
    {

        $libraries = Library::all();

        return view("library.index", ["libraries" => $libraries]);
        // Auth::logout();
    }
}
