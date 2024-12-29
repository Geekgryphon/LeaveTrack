<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>檢視</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if($parameters->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
    @else
        <div>
            <div>
                <div>參數類別</div>
                <div>參數名稱</div>
                <div>參數值</div>
                <div>描述</div>
                <div>該參數類別參數排序</div>
            </div>
            <div>
                @foreach($parameters as $parameter)
                    <div>
                        <div>
                            <a href="{{ route('parameters.edit', $parameter->id) }}">編輯</a>
                            <form action="{{ route('parameters.destroy', $parameter->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">刪除</button>
                            </form>
                        </div>
                        <div>{{ $parameter->type }}</div>
                        <div>{{ $parameter->name }}</div>
                        <div>{{ $parameter->value }}</div>
                        <div>{{ $parameter->description }}</div>
                        <div>{{ $parameter->sequence }}</div>
                    </div>
                @endforeach
            </div>
            <div>
                {{ $parameters->links() }}
            </div>
        </div>
    @endif

</body>
</html>