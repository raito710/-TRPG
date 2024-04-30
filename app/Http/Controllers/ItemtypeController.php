<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemtype;
class ItemtypeController extends Controller
{
   /**
     * アイテムタイプの一覧を表示する
     */
    public function index()
    {
        $itemTypes = Itemtype::all();
        return view('itemtypes.index', ['itemTypes' => $itemTypes]);
    }

    /**
     * 新規アイテムタイプ登録フォームを表示する
     */
    public function create()
    {
        return view('itemtypes.create');
    }

    /**
     * 新規アイテムタイプを保存する
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|unique:itemtypes|max:255',
            'description' => 'required|max:255',
        ]);

        $itemType = Itemtype::create($validatedData);
        return redirect()->route('itemtypes.index')->with('success', 'アイテムタイプを追加しました。');
    }

    // 他のメソッドも追加可能
}
