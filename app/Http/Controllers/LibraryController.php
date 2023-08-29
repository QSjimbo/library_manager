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

        $log = new Log();
        $log->user_id = $id;
        $log->library_id = $request->id;
        $log->rent_date = Carbon::now();//今日の日付を入れたい
        $log->return_due_date = $request->return_due_date;// Postのリクエスト内容の返却予定日
        $log->return_date = null;
        $log->save();
        return redirect("library/index");
    }

    public function returnBook(Request $request){
        $library = Library::find($request->id);
        $library->user_id = 0;
        $library->save();

        $sql = Log::query();
        $sql -> where("user_id", Auth::id());
        $sql -> where("library_id", $request->id);
        $sql -> orderBy("rent_date", "desc");// 同じユーザーが複数回借りることも考える。新しい順にしないといけない
        $log = $sql -> first();// 最新のものを取ってくる感じ
        $log -> return_date = Carbon::now();
        $log -> save();
        return redirect("library/index");
    }

    public function history(){
        $logs = Log::where("user_id", Auth::id())->get();
        $libraries = Library::all();
        view("library.borrowHistory", [
            "logs" => $logs,
            "user" => Auth::user()
        ]);
    }
}
