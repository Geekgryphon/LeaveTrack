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

    @if($signproxies->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
        <br/>
        <a href="{{ route('signproxies.create') }}">新增</a>
    @else
        <div>
            <div>
                <div>導覽預留區</div>
            </div>
            <div>
                <div>
                    <div></div>
                    <div>簽和者</div>
                    <div>代理者</div>
                    <div>開始時間</div>
                    <div>結束時間</div>
                </div>
                <div>
                    @foreach ($signproxies as $signproxy)
                        <div>
                            <div>
                                <a href="{{ route('signproxies.edit', $signproxy->id) }}">編輯</a>
                            </div>
                            <div>
                                <form action="{{ route('signproxies.destroy', $signproxy->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="">
                                        <button type="submit">刪除</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>{{ $signproxy->employee_id }} - {{ $signproxy->signname }}</div>
                        <div>{{ $signproxy->proxy_id }} - {{ $signproxy->proxyname }}</div>
                        <div>{{ $signproxy->begintime }}</div>
                        <div>{{ $signproxy->endtime }}</div>
                    @endforeach
                </div>
                {{ $signproxies->links() }}
                <div>
                    <a href="{{ route('signproxies.create') }}">新增</a>
                </div>
            </div>
        </div>
    @endif


</body>
</html>