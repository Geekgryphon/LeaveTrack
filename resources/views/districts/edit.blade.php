<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>編輯縣市</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">ID:</label>
        <div>{{ $city->id }}</div>
        
        <label for="name">縣市中文名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $city->name) }}">
        <br>

        <label for="value">縣市排列順序:</label>
        <input type="number" id="seq" name="seq" value="{{ old('seq', $city->seq) }}">
        <br>

        <button type="submit">編輯縣市</button>

        <a href="{{ route('cities.index') }}">取消</a>
    </form>
</body>
</html>