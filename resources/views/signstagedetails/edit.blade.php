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
    <form action="{{ route('signstagedetails.update', $signstagedetail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="">簽核項目</label>
        <br>

        <label for="employee_id">簽核者</label>
        <select name="employeeno" id="employeeno">
            @foreach($employees as $employee)
                <option value="{{ $employee->employeeno }}" {{ old('employeeno', $signstagedetail->employee_id) == $signstagedetail->employee_id ? 'selected' : '' }} > {{ $employee->employeeno }} - {{ $employee->name }}</option>
            @endforeach 
        </select>
        <br>

        <label for="order">順序</label>
        <input type="number" name="order" id="order" 
        value="{{ old('order', $signstagedetail->order)  }}">
        <br/>
        
        <button type="submit">編輯</button>
        <a href="{{ route('signstagedetails.index') }}">取消</a>
    </form>
</body>
</html>