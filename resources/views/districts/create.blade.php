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

    <form action="{{ route('districts.store') }}" method="POST">

        @csrf
        <label for="city_id">縣市:</label>
        <select id="city_id" name="city_id" value="{{ old('name') }}">
            @if($cities->isEmpty())
                <option value="">沒有縣市</option>
            @else
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">
                        {{ $city->name }}
                    </option>
                @endforeach
            @endif
        </select>
        <br>

        <label for="zipcode">郵政區號</label>
        <input type="text" id="zipcode" name="zipcode">
        <br/>

        <label for="name">鄉鎮名稱</label>
        <input type="text" id="name" name="name">
        <br/>

        <button type="submit">新增鄉鎮</button>
        <a href="{{ route('districts.index') }}">取消</a>
    </form>
</body>
</html>