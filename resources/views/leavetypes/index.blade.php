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

    @if($leavetypes->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
        <br/>
        <a href="{{ route('leavetypes.create') }}">新增</a>
    @else
        <div>
            <div>
                <div>導覽預留區</div>
            </div>
            <div>
                <div>
                    <div></div>
                    <div>假別代號</div>
                    <div>假別名稱</div>
                </div>
                <div>
                    @foreach ($leavetypes as $leavetype)
                        <div>
                            <div>
                                <a class="bg-green-600" href="{{ route('leavetypes.edit', $leavetype->id) }}">編輯</a>
                            </div>
                            <div>
                                <form action="{{ route('leavetypes.destroy', $leavetype->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <button class="bg-red-500" type="submit">停用</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div> {{ $leavetype->description }} </div>
                        <div> {{ $leavetype->value }} </div>
                    @endforeach
                </div>
                <div>
                    <a class="bg-blue-500" href="{{ route('leavetypes.create') }}">新增</a>
                </div>
            </div>
        </div>
    @endif


</body>
</html>