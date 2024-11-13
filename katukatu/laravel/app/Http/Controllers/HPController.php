<?php

namespace App\Http\Controllers;
use App\Events\HPChanged;
use Illuminate\Http\Request;
use App\Models\User;
class HPController extends Controller
{
    public function reduceHP($id)
    {
        $user = User::find($id);
        $user->hp = max(0, $user->hp - 10); // HPを10減少（0未満にはならない）
        $user->save();

        // HP変更イベントをブロードキャスト
        event(new HPChanged($id, $user->hp));

        return response()->json(['hp' => $user->hp]);
    }
}