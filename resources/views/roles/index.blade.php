<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <h1>檢視</h1>

    @if(session('success'))
        <x-message :message="session('success')" />
    @endif

    @if($roles->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
        <br/>
        <a href="{{ route('roles.create') }}">新增</a>
    @else
        <div class="grid grid-cols-[1fr_2fr]">
            <div class="gap-4">
                <div>導覽列預留區</div>
            </div>
            <div class="gap-8" >
                <div class="flex bg-red-500">
                    <div class="flex-none  w-15 inline-block"></div>
                    <div class="">職位代號</div>
                    <div class="">職位中文名稱</div>
                </div>
                <div>
                    @foreach($roles as $role)
                        <div class="flex">
                            <div>
                                <div class="bg-green-500 p-2  inline-block">
                                    <a href="{{ route('roles.edit', $role->id) }}">編輯</a>
                                </div>
                                <div class="bg-yellow-500 p-2  inline-block">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="bg ">
                                            <button type="submit">停用</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="w-1/7 inline-block">{{ $role->description }}</div>
                            <div class="w-1/7 inline-block">{{ $role->value }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="text-white bg-blue-700">
                    <a href="{{ route('roles.create') }}">新增</a>
                </div>
                <br/>
                <div>
                    {{ $roles->links() }}
                </div>
            </div>
            
        </div>
    @endif

</body>
</html>