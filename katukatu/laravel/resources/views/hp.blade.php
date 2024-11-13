<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket HP Test</title>
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>
    <h1>HP Management</h1>
    <div>
        <p id="user-{{ auth()->user()->id }}-hp">HP: {{ auth()->user()->hp }}</p>
        <button onclick="reduceHP({{ auth()->user()->id }})">Reduce My HP</button>
    </div>
</body>
<script>
    function reduceHP(userId) {
        fetch(`/reduce-hp/${userId}`);
    }
</script>
</html>