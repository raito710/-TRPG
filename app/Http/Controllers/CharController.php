<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Item;
class CharController extends Controller
{
    public function index()
    {
        // キャラクターとその所持アイテムの情報を取得
        $characters = Character::with('items')->get();

        // ビューにデータを渡して表示
        return view('characters', compact('characters'));
    }
    public function storeItem($characterId, $itemId)
    {
        $character = Character::findOrFail($characterId);
        $item = Item::findOrFail($itemId);
    
        // 中間テーブルにデータを保存
        $character->items()->attach($item->id);
    
        return redirect()->route('characters')->with('success', 'アイテムをキャラクターに追加しました。');
    }
    public function updateItem($characterId, $itemId)
    {
    $character = Character::findOrFail($characterId);
    $item = Item::findOrFail($itemId);

    // 中間テーブルのデータを更新
    $character->items()->sync([$item->id]);

    return redirect()->route('characters')->with('success', 'キャラクターのアイテムを更新しました。');
    }
    public function deleteItem($characterId, $itemId)
    {
        // 削除処理を行う
        $character = Character::findOrFail($characterId);
        
        // 中間テーブルから関連を削除
        $character->items()->detach($itemId);
        
        // リダイレクトなどの処理を行う
        return redirect()->route('characters.show', $characterId)->with('success', 'アイテムをキャラクターから削除しました。');
    }

}
