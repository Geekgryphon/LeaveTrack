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

        {{-- <input type="hidden" id="id" name="id" value="{{ $role->id }}"> --}}
        <label for="name">職位名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}">
        <br>

        <label for="value">職位代號:</label>
        <input type="text" id="value" name="value" value="{{ old('value', $role->value) }}">
        <br>
        
        <label for="description">職位中文名稱:</label>
        <input type="text" id="description" name="description" value="{{ old('descrpition', $role->description) }}">
        <br>

        <button type="submit">編輯參數</button>

        <a href="{{ route('roles.index') }}">取消</a>
    </form>
</body>
</html>