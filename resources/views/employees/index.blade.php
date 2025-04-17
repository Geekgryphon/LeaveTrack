<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <h1>檢視</h1>

    @if(session('success'))
        <x-message :message="session('success')" />
    @endif

    @if($employees->isEmpty())
        <div>
            沒有任何資料。
        </div>
        <br/>
        <a href="{{ route('employees.create') }}">新增</a>
    @else
        <div>
            <div>
                <div class="bg-green-500 p-2  inline-block">
                    <a href="{{ route('employees.edit', $employee->employeeno) }}">編輯</a>
                </div>
                <div class="bg-yellow-500 p-2  inline-block">
                    <form action="{{ route('employees.destroy', $employee->employeeno) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="bg ">
                            <button type="submit">刪除</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>職員帳號</div>
            <div>職員姓名</div>
            <div>性別</div>
            <div>生日</div>
        </div>
        <div>
            @foreach($employees as $employee)
                <div>{{ $employee->employeeno }}</div>
                <div>{{ $employee->employee_name }}</div>
                <div>{{ $employee->sex }}</div>
                <div>{{ $employee->birthday }}</div>
            @endforeach
        </div>
        <a class="bg-blue-500" href="{{ route('employees.create') }}">新增</a>

    @endif
</body>
</html>