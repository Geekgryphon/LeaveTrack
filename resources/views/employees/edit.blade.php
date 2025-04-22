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

    <form action="{{ route('employee.update', $employee->employeeno) }}" method="POST">
        @csrf

        <label for="employeeno">職員編號:</label>
        <input type="text" id="employeeno" name="employeeno" value="{{ old('employeeno', $employee->employeeno)}}">
        <br/>

        <label for="name">職員姓名:</label>
        <input type="text" id="name" name="name" value="{{ old('name')}}">
        <br/>

        <label for="sex">性別:</label>
        <select id="sex" name="sex">
            @foreach($sexs as $sex)
                <option value="{{ $sex->value }}" {{ old('sex') == $sex->value ? 'selected' : '' }}>{{ $sex->description }}</option>
            @endforeach
        </select>
        <br/>

        <label for="mobile">手機:</label>
        <input type="text" id="mobile" name="mobile" value="{{ old('mobile')}}">
        <br/>

        <label for="birthday">生日:</label>
        <input type="date" id="birthday" name="birthday" value="{{ old('birthday')}}">
        <br/>

        <label for="city_id">縣市:</label>
        <select id="city_id" name="city_id">
            <option value=''>請選擇縣市</option>
            @foreach($cities as $citie)
                <option value="{{ $citie->id }}" {{ old('city_id') == $citie->id ? 'selected' : '' }}>{{ $citie->name}}</option>
            @endforeach
        </select>
        <br/>

        <label for="district_id">鄉鎮區:</label>
        <select id="district_id" name="district_id">
            <option value=''>請選擇鄉鎮</option>
        </select>
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
    <script>
        var districts = @json($districts);

        function updateDistricts(cityId){
            

            var districtDropdown = document.getElementById('district_id');

            if(!cityId) {
                districtDropdown.innerHTML = "<option value=''>請選擇鄉鎮</option>";
                return;
            }else{
                districtDropdown.innerHTML = "";
            }

            var filteredDistricts = districts.filter(d =>d.city_id == cityId);

            filteredDistricts.forEach(d => {
                var option = document.createElement('option');
                option.value = d.id;
                option.textContent = d.name;
                districtDropdown.appendChild(option);
            });
        }

        document.getElementById('city_id').addEventListener('change', function(){
            updateDistricts(this.value);
        });

        document.addEventListener("DOMContentLoaded", function () {
            var oldCityId = "{{ old('city_id') }}";
            var oldDistrictId = "{{ old('district_id') }}";

            if (oldCityId) {
                updateDistricts(oldCityId);

                setTimeout(() => {
                    document.getElementById('district_id').value = oldDistrictId;
                }, 100);
            }
        });
    </script>
</body>
</html>