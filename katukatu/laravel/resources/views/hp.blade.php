<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HP Management</title>
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>
    <h1>HP Management</h1>
    <div id="user-list">
        @foreach ($users as $user)
            <div id="user-{{ $user->id }}">
                <p>{{ $user->name }}'s HP: <span id="user-{{ $user->id }}-hp">{{ $user->hp }}</span></p>
                <button onclick="reduceHP({{ $user->id }})">Reduce {{ $user->name }}'s HP</button>
            </div>
        @endforeach
    </div>
</body>
<script>
    // HPを減少させる処理
    function reduceHP(userId) {
        fetch(`/reduce-hp`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ userId: userId })
        }).catch(error => {
            console.error('Error reducing HP:', error);
        });
    }

    // Laravel Echoを使ってリアルタイム更新をリッスン
    window.Echo.channel('hp-channel')
        .listen('HPChanged', (e) => {
            const userId = e.userId;
            const hp = e.hp;

            // 対象ユーザーのHPをリアルタイム更新
            const hpElement = document.querySelector(`#user-${userId}-hp`);
            if (hpElement) {
                hpElement.textContent = hp;
            }
        });
</script>
</html>