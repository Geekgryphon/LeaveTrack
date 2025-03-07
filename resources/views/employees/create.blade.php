<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>新增職員資料</h1>

    <form action="{{ route('districts.store') }}" method="POST">
        @csrf
        <label for="id">職員編號:</label>
    </form>
</body>
</html>