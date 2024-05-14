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
        .character-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .character-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .character-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .character-details {
            margin-top: 10px;
        }
        .character-details p {
            margin: 5px 0;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .button-container button {
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            font-weight: bold;
            margin: 0 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Character List</h1>
    @if(session('user'))
        <p>ログイン中: {{ session('user')->name }}</p>
        <!-- キャラクター一覧 -->
        <div class="character-grid">
            @foreach ($characters as $character)
                @if ($character->user_id == session('user')->id)
                    <div class="character-item">
                        <img src="img/IMG_4421.jpeg" alt="Character Image">
                        <div class="character-details">
                            <p><strong>Character:</strong> {{ $character->charaname }}</p>
                            <p><strong>sex:</strong> {{ $character->sex }}</p>
                            <p><strong>age:</strong> {{ $character->age }}</p>
                            <p><strong>Jobs:</strong></p>
                            <ul>
                                @foreach ($character->jobs as $job)
                                    <li>
                                        {{ $job->name }}
                                        <ul>
                                            <strong>Skills:</strong>
                                            @foreach ($job->skills as $skill)
                                                <li>{{ $skill->skillname }} </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                            <p><strong>Items:</strong></p>
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
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <p>ログインしていません。</p>
    @endif

    <!-- ボタンのコンテナ -->
    <div class="button-container">
        <button type="button" onclick="openModal()">ユーザー登録</button>
        <button type="button" onclick="openloginModal()">ログイン</button> <!-- ボタン２がログインフォームを表示するように変更 -->
        <button type="button" onclick="openCreateCharacterModal()">キャラクター作成</button>
        <button type="button" onclick="downloadJson()">JSONダウンロード</button>
        <button type="button">ボタン5</button>
    </div>
</div>
</body>
<!-- モーダルウィンドウの追加 -->
<div id="loginmodal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
    <div style="background:#fff; padding:20px; border-radius:10px; width:300px;">
        <h2>ログイン</h2>
        <form action="/login" method="post">
            @csrf
            <div>
                <label>メールアドレス:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>パスワード:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">ログイン</button>
        </form>
        <button onclick="closeloginModal()">閉じる</button>
    </div>
</div>

<!-- モーダルウィンドウの追加 -->
<div id="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
    <div style="background:#fff; padding:20px; border-radius:10px; width:300px;">
        <h2>ユーザー登録</h2>
        <form action="/register" method="post">
            @csrf
            <div>
                <label>ユーザー名:</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label>メールアドレス:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>パスワード:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">登録</button>
        </form>
        <button onclick="closeModal()">閉じる</button>
    </div>
</div>
<!-- モーダルウィンドウの追加 -->
<div id="createCharacterModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
    <div style="background:#fff; padding:20px; border-radius:10px; width:300px;">
        <h2>キャラクター作成</h2>
        <form id="createCharacterForm" method="POST" action="{{ route('characters.store') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">

            <div>
                <label>キャラクター名:</label>
                <input type="text" name="charaname" required>
            </div>
            <div>
                <label>性別:</label>
                <input type="text" name="sex" required>
            </div>
            <div>
                <label>年齢:</label>
                <input type="text" name="age" required>
            </div>
            <div>
                <label>ジョブ:</label>
                <select name="job_id" required>
                    <option value="">選択してください</option>
                    @foreach ($jobs as $job)
                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>アイテム:</label>
                <select name="item_id" required>
                    <option value="">選択してください</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit">作成</button>
        </form>
        <button onclick="closeCreateCharacterModal()">閉じる</button>
    </div>
</div>



<script>
    function openModal() {
        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }
    function openloginModal() {
        document.getElementById('loginmodal').style.display = 'flex';
    }

    function closeloginModal() {
        document.getElementById('loginmodal').style.display = 'none';
    }
    function openCreateCharacterModal() {
        document.getElementById('createCharacterModal').style.display = 'flex';
    }

    function closeCreateCharacterModal() {
        document.getElementById('createCharacterModal').style.display = 'none';
    }

    function downloadJson() {
        fetch('/characters/export')
        .then(response => response.json()) // JSONレスポンスをパース
        .then(jsonData => {
            const jsonString = JSON.stringify(jsonData); // JSONデータを文字列に変換
            const blob = new Blob([jsonString], { type: 'application/json' }); // Blobオブジェクトに変換
            const url = URL.createObjectURL(blob); // BlobオブジェクトをURLに変換

            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'characters.json'; // ダウンロード時のファイル名を設定
            document.body.appendChild(a);
            a.click(); // リンクをクリックしてダウンロードを開始
            window.URL.revokeObjectURL(url); // 使用したURLを解放
        })
        .catch(error => console.error('Error downloading the file:', error));
}
</script>
</html>