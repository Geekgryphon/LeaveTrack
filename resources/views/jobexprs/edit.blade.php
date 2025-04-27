<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>編輯縣市</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jobexprs.update', $jobexpr->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="employee_id">職員職編:</label>
        
        <select id="employee_id" name="employee_id">
            @foreach($employees as $employee)  
                <option value='{{ $employee->employeeno }}' {{ old('employee_id', $jobexpr->employee_id) == $employee->employeeno ? 'selected' : '' }} >{{ $employee->employeeno }} - {{ $employee->name}}</option>
            @endforeach
        </select>
        <br>

        <label for="begindate">入職時間:</label>
        <input type="date" id="begindate" name="begindate" value="{{ old('begindate', $jobexpr->begindate) }}">
        <br>

        <label for="enddate">離職時間:</label>
        <input type="date" id="enddate" name="enddate" value="{{ old('enddate', $jobexpr->enddate) }}">
        <br>

        <label for="jobtype">職位種類:</label>
        <select id="jobtype" name="jobtype">
            @foreach($roles as $role)
                <option value='{{ $role->value }}' {{ old('jobtype', $jobexpr->jobtype) == $role->value ? 'selected' : '' }} >{{ $role->description}}</option>
            @endforeach
        </select>
        <br/>
        
        <button type="submit">編輯經歷</button>
        <a href="{{ route('jobexprs.index') }}">取消</a>
    </form>
</body>
</html>