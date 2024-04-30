<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Item モデルを使用
use App\Models\Itemtype; // 追加：ItemType モデルを使用

class ItemController extends Controller
{
    /**
     * アイテム一覧を表示する
     */
    public function index()
    {
        $items = Item::with('itemtypes')->get(); // Itemtype も eager load する
        return view('items.index', ['items' => $items]);
    }
    

    /**
     * アイテム詳細ページ
     */
    public function show($id)
    {
        $item = Item::findOrFail($id); // アイテムを検索、見つからない場合は404
        return view('items.show', compact('item'));
    }

    /**
     * 新規アイテム登録フォーム
     */
    public function create()
    {
        return view('items.create');
    }
    
    /**
     * アイテムタイプ一覧を表示する
     */
    public function indexItemTypes()
    {
        $itemTypes = Itemtype::all();
        return view('characters', ['itemTypes' => $itemTypes]);
    }

    /**
     * アイテムタイプ詳細を表示する
     */
    public function showItemType($id)
    {
        $itemType = Itemtype::findOrFail($id);
        return view('characters', ['itemType' => $itemType]);
    }
    /**
     * 新規アイテムをデータベースに保存
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'quantity' => 'required|integer',
        ]);

        $item = Item::create($validatedData);
        return redirect()->route('items.index')->with('success', 'アイテムを追加しました。');
    }

    /**
     * アイテム編集フォーム
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    /**
     * アイテム情報の更新を処理
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'quantity' => 'required|integer',
        ]);

        $item = Item::findOrFail($id);
        $item->update($validatedData);
        return redirect()->route('items.index')->with('success', 'アイテム情報を更新しました。');
    }

    /**
     * アイテムを削除
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'アイテムを削除しました。');
    }
}