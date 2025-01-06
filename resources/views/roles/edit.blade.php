<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>編輯職位</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">ID:</label>
        <div>{{ $role->id }}</div>

        <label for="symbol">職位代號:</label>
        <input type="text" id="symbol" name="symbol" value="{{ old('symbol', $role->symbol) }}">
        <br>
        
        <label for="name">職位中文名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}">
        <br>

        <button type="submit">編輯參數</button>

        <a href="{{ route('roles.index') }}">取消</a>
    </form>
</body>
</html>