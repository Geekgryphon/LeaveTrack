<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新增鄉鎮</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cities.store') }}" method="POST">

        @csrf
        <label for="name">縣市中文名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        <br>
        
        <button type="submit">新增縣市</button>

        <a href="{{ route('cities.index') }}">取消</a>
    </form>
</body>
</html>