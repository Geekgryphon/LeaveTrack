<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新增職位</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">

        @csrf
        <label for="value">職位名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        <br>

        <label for="value">職位代號:</label>
        <input type="text" id="value" name="value" value="{{ old('value') }}">
        <br>
        
        <label for="description">職位中文名稱:</label>
        <input type="text" id="description" name="description" value="{{ old('description') }}">
        <br>

        <button type="submit">新增職位</button>

        <a href="{{ route('roles.index') }}">取消</a>
    </form>
</body>
</html>