<?php

namespace App\Http\Controllers;
use App\Events\HPChanged;
use Illuminate\Http\Request;
use App\Models\User;
class HPController extends Controller
{
    public function homeHP()
    {
        // 全ユーザーを取得（ビューで表示用）
        $users = User::all();

        // 現在ログイン中のユーザーのHPを減少
        $currentUser = auth()->user();
        $currentUser->hp = max(0, $currentUser->hp - 10); // HPを10減少（0未満にはならない）
        $currentUser->save();

        // HP変更イベントをブロードキャスト
        event(new HPChanged($currentUser->id, $currentUser->hp));

        // ビューに全ユーザーのデータを渡す
        return view('hp', ['users' => $users]);
    }
    
    public function reduceHP(Request $request)
    {
        $userId = $request->input('userId'); // リクエストからユーザーIDを取得
        $user = User::findOrFail($userId); // 該当ユーザーを取得

        $user->hp = max(0, $user->hp - 10); // HPを10減少（0未満にはならない）
        $user->save();

        // HP変更イベントをブロードキャスト
        event(new HPChanged($user->id, $user->hp));

        return response()->json(['hp' => $user->hp]); // 新しいHPをJSONで返す
    }
}