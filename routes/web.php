<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/characters', [CharController::class, 'index']);//->name('characters');
Route::post('/characters/{characterId}/items/{itemId}', [CharController::class, 'storeItem'])->name('characters.items.store');
Route::delete('/characters/{characterId}/items/{itemId}', [CharController::class, 'deleteItem'])->name('characters.items.delete');
Route::put('/characters/{characterId}/items/{itemId}', [CharController::class, 'updateItem'])->name('characters.items.update');
Route::post('/characters', [CharController::class, 'store'])->name('characters.store');
Route::get('/characters/export', [CharController::class, 'exportCharacters']);


Route::get('/items', [ItemController::class, 'index'])->name('items');
// アイテム作成ページへのルート
Route::get('/items/create', [ItemController::class, 'create']);
Route::get('/items', [ItemController::class, 'indexItemTypes'])->name('itemTypes');
// routes/web.php
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class,'register'])->name('register');


