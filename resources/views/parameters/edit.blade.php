<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>編輯參數</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('parameters.update', $parameter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">ID: {{ $parameter->id }}</label>

        <label for="type">參數類別:</label>
        <input type="text" id="type" name="type" value="{{ old('type', $parameter->type) }}">
        <br>
        
        <label for="name">參數名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $parameter->name) }}">
        <br>

        <label for="description">參數名稱中文描述:</label>
        <input type="text" id="description" name="description" value="{{ old('description', $parameter->description) }}">
        <br>

        <label for="value">參數值:</label>
        <input type="text" id="value" name="value" value="{{ old('value', $parameter->value) }}">
        <br>

        <label for="value">同參數類別排序:</label>
        <input type="number" id="sequence" name="sequence" value="{{ old('sequence', $parameter->sequence) }}">
        <br>

        <label for="IsUsed">使用中:</label>
        <input type="checkbox" id="IsUsed", name="IsUsed" value="1" {{ old('IsUsed', $parameter->IsUsed) ? 'checked' : '' }}>
        <br/>

        <button type="submit">編輯參數</button>

        <a href="{{ route('parameters.index') }}">取消</a>
    </form>
</body>
</html>