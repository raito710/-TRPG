<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User; // Userモデルをインポート
use Illuminate\Support\Facades\Auth; // Auth クラスをインポート
class AuthController extends Controller
{
    public function register(Request $request)
    {
        // バリデーション
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users', // usersテーブルのemailカラムで一意であることをチェック
            'password' => 'required|min:6',
        ]);

        // ユーザーを作成して保存
        $user = new User();
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // 登録後のリダイレクト
        return redirect('/characters')->with('user', $user);
    }
    public function login(Request $request)
    {
        
            // バリデーション
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            // ログインの試行
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                // 認証に成功した場合は、認証ユーザーのIDをセッションに保存し、リダイレクト
                $user = Auth::user(); // ログインしたユーザーの情報を取得
                session(['user_id' => $user->id]); // ユーザーIDをセッションに保存
                return redirect('/characters')->with('user', $user); // ユーザー情報をリダイレクト先に渡す
            } else {
                // 認証に失敗した場合は、ログインフォームにリダイレクトし、エラーメッセージを追加
                return redirect('/login')->with('error', 'ログインに失敗しました。');
            }
    }
}