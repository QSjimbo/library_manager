<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Library;
use App\Log;
use Carbon\Carbon;

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
        $user = Auth::user();
        return view("library.borrow", [
            "library" => $library,
            "user" => $user
        ]);
    }
    public function borrow(Request $request){
        $library = Library::find($request->id);
        $id = Auth::id();// カレントユーザーのID取得の書き方
        $library->user_id = $id;
        $library-> save();

        $user = Auth::user();
        $log = new Log();
        $log->user_id = $id;
        $log->libray_id = $request->id;
        $log->rent_date = Carbon::now();//今日の日付を入れたい
        $log-> return_due_date = $request->return_due_date;// Postのリクエスト内容の返却予定日
        $log->return_date = NULL;
        $log->save() ;
        return redirect("library/index");
    }
}
