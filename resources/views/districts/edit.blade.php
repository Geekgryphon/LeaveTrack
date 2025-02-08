<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>編輯縣市</h1>

    <form action="{{ route('districts.update', $district->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">
            ID: {{ $district->id }} 
        </label>
        <br/>

        @csrf
        <label for="city_id">縣市:</label>
        <select id="city_id" name="city_id">
            @if($cities->isEmpty())
                <option value="">沒有縣市</option>
            @else
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id', $district->city_id) ==  $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            @endif
        </select>
        <br>

        <label for="name">郵政區號:</label>
        <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode', $district->zipcode) }}">
        <br>
        
        <label for="name">鄉鎮中文名稱:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $district->name) }}">
        <br>

        <label for="value">鄉鎮排列順序:</label>
        <input type="number" id="seq" name="seq" value="{{ old('seq', $district->seq) }}">
        <br>

        <button type="submit">編輯鄉鎮</button>

        <a href="{{ route('districts.index') }}">取消</a>
    </form>
</body>
</html>