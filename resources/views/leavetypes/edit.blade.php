<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>編輯假別</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leavetypes.update', $leavetype->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">ID:</label>
        <div>{{ $leavetype->id }}</div>
        
        <label for="code">假別代號:</label>
        <input type="text" id="code" name="code" value="{{ old('code', $leavetype->code) }}">
        <br>

        <label for="name">假別名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $leavetype->name) }}">
        <br>

        <button type="submit">編輯假別</button>

        <a href="{{ route('leavetypes.index') }}">取消</a>
    </form>
</body>
</html>