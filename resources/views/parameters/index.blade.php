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

    @if($parameters->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
        <br/>
        <a href="{{ route('parameters.create') }}">新增</a>
    @else
        <div class="grid grid-cols-[1fr_2fr]">
            <div class="gap-4">
                <div>導覽列預留區</div>
            </div>
            <div class="gap-8" >
                <div class="flex bg-red-500">
                    <div class="flex-none  w-15 inline-block"></div>
                    <div class="w-10 inline-block">參數類別</div>
                    <div class="w-10 inline-block">參數名稱</div>
                    <div class="w-10 inline-block">參數值</div>
                    <div class="w-10 inline-block">描述</div>
                    <div class="w-10 inline-block">該參數類別參數排序</div>
                    <div class="w-20 inline-block">使用中</div>
                </div>
                <div>
                    @foreach($parameters as $parameter)
                        <div class="flex">
                            <div>
                                <div class="bg-green-500 p-2  inline-block">
                                    <a href="{{ route('parameters.edit', $parameter->id) }}">編輯</a>
                                </div>
                                <div class="bg-yellow-500 p-2  inline-block">
                                    <form action="{{ route('parameters.destroy', $parameter->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="bg ">
                                            <button type="submit">刪除</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="w-1/7 inline-block">{{ $parameter->type }}</div>
                            <div class="w-1/7 inline-block">{{ $parameter->name }}</div>
                            <div class="w-1/7 inline-block">{{ $parameter->value }}</div>
                            <div class="w-1/7 inline-block">{{ $parameter->description }}</div>
                            <div class="w-1/7 inline-block">{{ $parameter->sequence }}</div>
                            <div class="w-1/7 inline-block">{{ $parameter->IsUsed == '1' ? '使用中' : '已停用' }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="text-white bg-blue-700">
                    <a href="{{ route('parameters.create') }}">新增</a>
                </div>
                <br/>
                <div>
                    {{ $parameters->links() }}
                </div>
            </div>
            
        </div>
    @endif

</body>
</html>