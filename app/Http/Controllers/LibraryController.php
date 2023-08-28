<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Library;
use App\Log;

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
        $user = Auth::user();
        return view("library.index", ["libraries" => $libraries], ["user" => $user]);
    }
    public function borrowingForm(Request $request){
        $library = Library::find($request->id);
        // dd($library);
        return view("library.borrow", ["library" => $library]);
    }
    public function borrow(Request $request){
        $library = library::find($request->id);
        $id = Auth::id();// カレントユーザーのID取得の書き方
        $library->user_id = $id;
        $library-> save();
        $log = new Log();
        $log->libray_id = $request->id;
        $log->user_id = $id;
        $log->rent_date = date("Y-m-d H:i:s");//今日の日付を入れたい
        $log-> rent_due_date = date("Y-m-d H:i:s");// 本当はPostリクエスト内容の返却予定日
        $log->return_date = NULL;
        $log->save() ;
        return redirect("library/index");
    }
}
