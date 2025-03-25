<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>新增職員資料</h1>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label for="id">職員編號:</label>
        <input type="text" id="id" name="id" value="{{ old('id')}}">
        <br/>

        <label for="name">職員姓名:</label>
        <input type="text" id="name" name="name" value="{{ old('name')}}">
        <br/>

        <label for="sex">性別:</label>
        <input type="text" id="sex" name="sex" value="{{ old('sex')}}">
        <br/>

        <label for="mobile">手機:</label>
        <input type="text" id="mobile" name="mobile" value="{{ old('mobile')}}">
        <br/>

        <label for="birthday">生日:</label>
        <input type="date" id="mobile" name="mobile" value="{{ old('mobile')}}">
        <br/>

        <label for="city_id">縣市:</label>
        <input type="text" id="city_id" name="city_id" value="{{ old('city_id')}}">
        <br/>

        <label for="district_id">鄉鎮區:</label>
        <input type="text" id="district_id" name="district_id" value="{{ old('district_id')}}">
        <br/>

        <label for="street">地址:</label>
        <input type="text" id="street" name="street" value="{{ old('street')}}">
        <br/>

        <label for="emergencycontactname">緊急連絡人:</label>
        <input type="text" id="emergencycontactname" name="emergencycontactname" value="{{ old('emergencycontactname')}}">
        <br/>

        <label for="emergencycontactphone">緊急連絡人電話:</label>
        <input type="text" id="emergencycontactphone" name="emergencycontactphone" value="{{ old('emergencycontactphone')}}">
        <br/>

        <button type="submit">送出</button>
        <a href="{{ route('employees.index') }}">取消</a>
    </form>
</body>
</html>