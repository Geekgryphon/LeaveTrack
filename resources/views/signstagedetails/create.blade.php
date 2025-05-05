<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>新增簽核關卡</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action=" {{ route('signstagedetails.store') }}" method="POST">

        @csrf
        <label for="signstage_id">簽核項目:</label>
        <select id="signstage_id" name="signstage_id">
            @foreach( $signstages as $signstage)
                <option value="{{ $signstage->code }}" {{ old("signstage_id") == $signstage->code ? 'selected' : ''  }} > {{ $signstage->name }}</option>
            @endforeach
        </select>
        <br/>


        <label for="employee_id">簽核者:</label>
        <select id="employee_id" name="employee_id">
            @foreach( $employees as $employee)
                <option value="{{ $employee->employeeno }}" {{ old("employee_id") == $employee->employeeno ? 'selected' : ''  }} > {{ $employee->employeeno }} - {{ $employee->name }}</option>
            @endforeach
        </select>
        <br/>
        
        <button type="submit">新增簽核關卡</button>
        <a href="{{ route('signstagedetails.index') }}">取消</a>
    </form>

</body>
</html>