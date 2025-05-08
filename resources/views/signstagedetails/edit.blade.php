<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>編輯簽核關卡</h1>
    <form action="" method="POST">
        <label for="">簽核項目</label>
        <br>

        <label for="employee_id">簽核者</label>
        <select name="employeeno" id="employeeno">
            @foreach($employees as $employee)
                <option value="{{ $employee->employeeno }}" {{ old('employeeno', $signstagedetail->employee_id) == $signstagedetail->employee_id ? 'selected' : '' }} > {{ $employee->employeeno }} - {{ $employee->name }}</option>
            @endforeach 
        </select>
        <br>

        <label for="seq">順序</label>
        <input type="number" name="seq" id="seq" 
        value="{{ old('seq', $signstagedetail->seq ? $signstagedetail->seq : '' )  }}">
        
        <button type="submit">編輯</button>
        <a href="{{ route('signstagedetails.index') }}">取消</a>
    </form>
</body>
</html>