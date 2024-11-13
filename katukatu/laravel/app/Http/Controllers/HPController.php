<?php

namespace App\Http\Controllers;
use App\Events\HPChanged;
use Illuminate\Http\Request;
use App\Models\User;
class HPController extends Controller
{
    public function homeHP()
    {
        $user = auth()->user(); // 現在ログイン中のユーザー
        $user->hp = max(0, $user->hp - 10); // HPを10減少（0未満にはならない）
        $user->save();

        // HP変更イベントをブロードキャスト
        event(new HPChanged($user->id, $user->hp));

        return view('hp', ['user' => $user]);
    }
    
    public function reduceHP()
    {
        $user = auth()->user(); // 現在ログイン中のユーザー
        $user->hp = max(0, $user->hp - 10); // HPを10減少（0未満にはならない）
        $user->save();

        // HP変更イベントをブロードキャスト
        event(new HPChanged($user->id, $user->hp));

        return response()->json(['hp' => $user->hp]);
    }
}