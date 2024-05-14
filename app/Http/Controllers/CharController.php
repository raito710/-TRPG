<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Item;
use App\Models\Job;
class CharController extends Controller
{
    public function index()
    {
        // キャラクターとその所持アイテムの情報を取得
        $characters = Character::with('items')->get();
        
        // ジョブのリストを取得
        $jobs = Job::all();
        // アイテムのリストを取得
        $items = Item::all();
        // ビューにデータを渡して表示
        return view('characters', compact('characters', 'jobs','items'));
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
    public function store(Request $request)
    {
        $request->validate([
            'charaname' => 'required',
            'sex' => 'required',
            'job_id' => 'required', // ジョブIDを必須に設定
            'item_id' => 'required', // アイテムIDを必須に設定
        ]);
    
        // キャラクターを作成
        $character = new Character();
        $character->charaname = $request->input('charaname');
        $character->sex = $request->input('sex');
        $character->age = $request->input('age');
        $character->user_id = auth()->user()->id;
        $character->save();
    
        // ジョブとアイテムのIDを取得
        $jobId = $request->input('job_id');
        $itemId = $request->input('item_id');
    
        // ジョブとアイテムを中間テーブルに関連付ける
        $character->jobs()->attach($jobId);
        $character->items()->attach($itemId);
    
        return redirect('/characters')->with('success', 'キャラクターが作成されました。');
    }
    public function exportCharacters()
    {
        $characters = Character::all(); // キャラクターデータを取得する（適宜、クエリを追加してください）
    
        return response()->json($characters);
    }
}
