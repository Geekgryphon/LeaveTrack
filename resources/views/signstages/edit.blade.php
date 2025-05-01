<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>編輯簽核</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('signstages.update', $signstage->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- <input type="hidden" id="id" name="id" value="{{ $role->id }}"> --}}
        <label for="name">簽核代號:</label>
        <input type="text" id="code" name="code" value="{{ old('name', $signstage->code) }}">
        <br>

        <label for="value">簽核名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $signstage->name) }}">
        <br>

        <button type="submit">編輯簽核</button>

        <a href="{{ route('signstages.index') }}">取消</a>
    </form>
</body>
</html>