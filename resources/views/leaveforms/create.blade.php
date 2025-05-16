<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>新增請假申請單</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leaveforms.store') }}">

        <label for="employee_id">請假者</label>
        <select name="employee_id" id="employee_id">
            @foreach($employees as $employee)
                <option value="{{ $employee->employeeno }}" {{ old('employee_id') == $employee->employeeno ? 'selected' : ''  }}>{{ $employee->employeeno }} - {{ $employee->name }}</option>
            @endforeach
        </select>

        <label for="signstage_id">簽核項目</label>
        <select name="signstage_id" id="signstage_id">
            @foreach( $signstages as $signstage)
                <option value="{{ $signstage->code }}" {{ old('signstage_id') == $signstage->code ? 'selected' : '' }}>{{ $signstage->name }}</option>
            @endforeach
        </select>
        <br/>

        <label for="leavebegintime">請假起時</label>
        <input type="datetime" id="leavebegintime" name="leavebegintime" value="{{ old('leavebegintime') }}">
        <br/>

        <label for="leaveendtime">請假迄時</label>
        <input type="datetime" id="leaveendtime" name="leaveendtime" value="{{ old('leaveendtime') }}">
        <br/>

        <label for="reason">請假事由</label>
        <textarea name="reason" id="reason" cols="30" rows="10">
            {{ old('reason') }}
        </textarea>
        <br/>

        <button type="submit">新增請假單</button>
        <a href="{{ route('leaveforms.index') }}">取消</a>
    </form>
</body>
</html>