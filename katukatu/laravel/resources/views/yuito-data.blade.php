<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bladeテンプレートの基本</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<!-- <pre>は改行とかそのまま表示させる感じの<p>みたいなやつ -->
<!-- <code>はこれはコードだよってわかりやすく表示させる感じの<p>みたいなやつ -->

<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-8">Bladeテンプレートの基本</h1>


        <section>
            <h2 class="text-2xl font-bold mb-4">1. ルートの移動</h2>
            <p class="mb-4">
                Bladeでは、`route()` 関数を使って別のページにリンクを作成できます。
            </p>
            <pre class="bg-gray-100 p-4 rounded mb-6">
                <code>
                {{-- リンクを作成する例 --}}
                    <a href="{{ route('home') }}">ホームに戻る</a>
                </code>
            </pre>
        </section>
        

        <section>
            <h2 class="text-2xl font-bold mb-4">2. データベースのデータを表示</h2>
            <p class="mb-4">
                データベースから取得したデータを`foreach`を使って表示します。<br>
                コントローラーに変数があるよ
            </p>
            <pre class="bg-gray-100 p-4 rounded mb-6">
                <code>
                {{-- itemsテーブルから取得したデータを表示する例 --}}
                @foreach ($items as $item)
                    <p>{{ $item->name }}</p>
                @endforeach
                </code>
            </pre>
        </section>
        

        <section>
            <h2 class="text-2xl font-bold mb-4">3. if文を使った条件分岐</h2>
            <p class="mb-4">
                Bladeでは`if`文を使って条件分岐ができます。以下はデータが存在するかどうかの例です。
            </p>
            <pre class="bg-gray-100 p-4 rounded mb-6">
                <code>
                {{-- データがあるかどうかで表示内容を変える例 --}}
                @if ($items->isEmpty())
                    <p>データがありません。</p>
                @else
                    @foreach ($items as $item)
                        <p>{{ $item->name }}</p>
                    @endforeach
                @endif
                </code>
            </pre>
        </section>


    </div>
</body>
</html>