<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新增簽核</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('signstages.store') }}" method="POST">

        @csrf
        <label for="value">簽核代號:</label>
        <input type="text" id="code" name="code" value="{{ old('code') }}">
        <br>

        <label for="value">簽核名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        <br>

        <button type="submit">新增簽核</button>

        <a href="{{ route('signstages.index') }}">取消</a>
    </form>
</body>
</html>