<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>編輯職員資料</h1>

    <form action="{{ route('employees.update', $employeeno) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="employeeno">職員編號: {{ $employeeno }}</label>
        <br/>

        <label for="name">職員姓名:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $employee->name)}}">
        <br/>

        <label for="sex">性別:</label>
        <select id="sex" name="sex">
            @foreach($sexs as $sex)
                <option value="{{ $sex->value }}" {{ old('sex', $employee->sex) == $sex->value ? 'selected' : '' }}>{{ $sex->description }}</option>
            @endforeach
        </select>
        <br/>

        <label for="mobile">手機:</label>
        <input type="text" id="mobile" name="mobile" value="{{ old('mobile', $employee->mobile)}}">
        <br/>

        <label for="birthday">生日:</label>
        <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $employee->birthday)}}">
        <br/>

        <label for="city_id">縣市:</label>
        <select id="city_id" name="city_id">
            <option value=''>請選擇縣市</option>
            @foreach($cities as $citie)
                <option value="{{ $citie->id }}" {{ old('city_id', $employee->city_id) == $citie->id ? 'selected' : '' }}>{{ $citie->name}}</option>
            @endforeach
        </select>
        <br/>

        <label for="district_id">鄉鎮區:</label>
        <select id="district_id" name="district_id">
            <option value=''>請選擇鄉鎮</option>
        </select>
        <br/>

        <label for="street">地址:</label>
        <input type="text" id="street" name="street" value="{{ old('street', $employee->street)}}">
        <br/>

        <label for="emergencycontactname">緊急連絡人:</label>
        <input type="text" id="emergencycontactname" name="emergencycontactname" value="{{ old('emergencycontactname', $employee->emergencycontactname)}}">
        <br/>

        <label for="emergencycontactphone">緊急連絡人電話:</label>
        <input type="text" id="emergencycontactphone" name="emergencycontactphone" value="{{ old('emergencycontactphone', $employee->emergencycontactphone)}}">
        <br/>

        <button type="submit">送出</button>
        <a href="{{ route('employees.index') }}">取消</a>
    </form>
    <script>
        var districts = @json($districts);

    document.addEventListener("DOMContentLoaded", function () {

        const citySelect = document.getElementById('city_id');
        const districtSelect = document.getElementById('district_id');

        const oldCityId = "{{ old('city_id', $employee->city_id) }}";
        const oldDistrictId = "{{ old('district_id', $employee->district_id) }}";

        function updateDistricts(cityId, districtSelectElement, selectedDistrictId = null) {
            districtSelectElement.innerHTML = "<option value=''>請選擇鄉鎮</option>";

            if (!cityId) return;

            const filteredDistricts = districts.filter(d => d.city_id == cityId);

            filteredDistricts.forEach(d => {
                const option = document.createElement('option');
                option.value = d.id;
                option.textContent = d.name;
                if (selectedDistrictId && String(selectedDistrictId) === String(d.id) ) {
                    option.selected = true;
                }
                districtSelectElement.appendChild(option);
            });
        }

        updateDistricts(oldCityId, districtSelect, oldDistrictId);

        citySelect.addEventListener('change', function () {
            updateDistricts(this.value, districtSelect);
        });
    });

    </script>
</body>
</html>