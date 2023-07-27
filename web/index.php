<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        ws = new WebSocket("ws://localhost:2346");
        ws.onopen = function() {
            ws.send('indetefication');
            console.log('connected');

        };
        ws.onmessage = function(e) {
            console.log(e.data)
        };
    </script>
</body>
</html>