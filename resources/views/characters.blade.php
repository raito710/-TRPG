<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character List</title>
    <style>
        body {
            font-family: "Yu Gothic", "YuGothic", "游ゴシック", "Meiryo", sans-serif;
            background-color: #f0f0f0;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #990;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #000;
        }
        select, button {
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #fff;
            color: #000;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        ul li strong {
            font-size: 20px;
            color: #000;
        }
        ul li p {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
        ul li ul {
            margin-top: 10px;
        }
        ul li ul li {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        form button {
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            font-weight: bold;
        }
        form button:hover {
            background-color: #45a049;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Character List</h1>

        <!-- ボタンのコンテナ -->
        <div class="button-container">
            <button type="button">ボタン1</button>
            <button type="button">ボタン2</button>
            <button type="button">ボタン3</button>
            <button type="button">ボタン4</button>
            <button type="button">ボタン5</button>
        </div>

        <form>
            <label for="items">アイテムを選択：</label>
            <select id="items" name="items">
                <option value="">アイテムを選択してください</option>
                @foreach ($characters as $character)
                    @foreach ($character->items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endforeach
            </select>
        </form>
        
        <!-- キャラクター一覧 -->
        <ul>
            @foreach ($characters as $character)
                <li>
                    <p>character:</p>
                    <strong>{{ $character->charaname }}</strong>
                    <!-- ここに画像を追加 -->
                    <img src="img/IMG_4421.jpeg" alt="Character Image" style="width: 100%; max-width: 90px; height: auto;">

                    <p>Jobs:</p>
                    <ul>
                        @foreach ($character->jobs as $job)
                            <li>{{ $job->name }}</li>
                        @endforeach
                    </ul>
                    <p>Items:</p>
                    <ul>
                        @foreach ($character->items as $item)
                            <li>
                                <strong>{{ $item->name }}</strong>
                                @if ($item->itemtypes)
                                    <strong>{{ $item->itemtypes->type }}</strong>
                                @else
                                    <strong>未定義のタイプ</strong>
                                @endif

                                <form action="{{ route('characters.items.store', ['characterId' => $character->id, 'itemId' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit">追加</button>
                                </form>

                                <form action="{{ route('characters.items.update', ['characterId' => $character->id, 'itemId' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">更新</button>
                                </form>

                                <form action="{{ route('characters.items.delete', ['characterId' => $character->id, 'itemId' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">削除</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>