<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/characters', [CharController::class, 'index']);//->name('characters');
Route::post('/characters/{characterId}/items/{itemId}', [CharController::class, 'storeItem'])->name('characters.items.store');
Route::delete('/characters/{characterId}/items/{itemId}', [CharController::class, 'deleteItem'])->name('characters.items.delete');
Route::put('/characters/{characterId}/items/{itemId}', [CharController::class, 'updateItem'])->name('characters.items.update');
Route::get('/items', [ItemController::class, 'index'])->name('items');
// アイテム作成ページへのルート
Route::get('/items/create', [ItemController::class, 'create']);
Route::get('/items', [ItemController::class, 'indexItemTypes'])->name('itemTypes');
