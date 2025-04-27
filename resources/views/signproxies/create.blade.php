<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新增代理人</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('signproxies.store') }}" method="POST">
        @csrf

        <label for="employee_id">簽和者:</label>
        <select name="employee_id" id="employee_id">
            @foreach($employees as $employee)
                <option value="{{ $employee->employeeno }}" {{ old('employee_id') ? 'selected' : ''}}>{{ $employee->employeeno }} - {{ $employee->name }}</option>
            @endforeach
        </select>
        <br/>

        <label for="proxy_id">代理人:</label>
        <select name="proxy_id" id="proxy_id">
            @foreach($employees as $employee)
                <option value="{{ $employee->employeeno }}" {{ old('proxy_id') ? 'selected' : ''}}>{{ $employee->employeeno }} - {{ $employee->name }}</option>
            @endforeach
        </select>
        <br/>

        <label for="begintime">開始時間:</label>
        <input type="datetime-local" name='begintime' id='begintime'>
        <br/>

        <label for="endtime">結束時間:</label>
        <input type="datetime-local" name='endtime' id='endtime'>
        <br/>
        
        <button type="submit">新增代理資料</button>
        <a href="{{ route('signproxies.index') }}">取消</a>
    </form>
</body>
</html>