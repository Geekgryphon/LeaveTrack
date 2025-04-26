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
        <a class="bg-blue-500" href="{{ route('employees.create') }}">新增</a>
    @else
       
            <div>
                <div class="inline-block"></div>
                <div class="inline-block">職員帳號</div>
                <div class="inline-block">職員姓名</div>
                <div class="inline-block">性別</div>
                <div class="inline-block">生日</div>
            </div>
            @foreach($employees as $employee)
            <div>
                <div class="inline-block" >
                    <div class="bg-green-500 p-2  inline-block">
                        <a href="{{ route('employees.edit', $employee->employeeno) }}">編輯</a>
                    </div>
                    <div class="{{ $employee->is_banned ? 'bg-blue-500' : 'bg-red-500' }} p-2  inline-block">
                        <form action="{{ route('employees.updateIsBanned', $employee->employeeno) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div>
                                <button type="submit">{{ $employee->is_banned ? '復權' : '停權' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="inline-block" >{{ $employee->employeeno }}</div>
                <div class="inline-block">{{ $employee->employee_name }}</div>
                <div class="inline-block">{{ $employee->sex }}</div>
                <div class="inline-block">{{ $employee->birthday }}</div>
            </div>
            @endforeach
        <a class="bg-blue-500" href="{{ route('employees.create') }}">新增</a>

        <br/>
        <div>
            {{ $employees->links() }}
        </div>

    @endif
</body>
</html>