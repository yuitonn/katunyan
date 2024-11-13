<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Itemモデルを使用

class DataController extends Controller
{
    public function show()
    {
        // itemsテーブルからすべてのデータを取得
        $items = Item::all();
        return view('yuito-data', ['items' => $items]);
    }

    public function show2()
    {
        // itemsテーブルからすべてのデータを取得
        $items = Item::all();
        return view('yuito-form', ['items' => $items]);
    }


    // フォームから送信されたデータを保存するメソッド
    public function store(Request $request)
    {

        // デバッグ用にリクエストデータを表示
        // dd($request->all());

        // バリデーションを追加
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // データをデータベースに保存
        $item = new Item();
        $item->name = $request->input('name');
        $item->save();

        // 成功メッセージをセッションに追加してリ ルートのnameが yuito-data にダイレクト
        return redirect()->route('yuito-data')->with('success', 'アイテムが保存されました！');
    }
}