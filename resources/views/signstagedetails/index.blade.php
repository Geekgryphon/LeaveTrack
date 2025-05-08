<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>檢視</h1>

    @if(session('success'))
        <x-message :message="session('success')" />
    @endif

    @if($signstagedetails->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
        <br/>
        <a href="{{ route('signstagedetails.create') }}">新增簽核關卡</a>
    @else
        <div>
            <div></div>
            <div>簽核項目</div>
            <div>簽核者</div>
            <div>簽核項目簽核順序</div>
        </div>
        <div>
        @foreach($signstagedetails as $signstagedetail)
            <div>
                <div>
                    <a href="{{ route('signstagedetails.edit', $signstagedetail->id) }}">編輯</a>
                </div>
                <div>
                    <form action="{{ route('signstagedetails.destroy', $signstagedetail->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div>
                            <button type="submit">刪除</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>{{ $signstagedetail->code }}</div>
            <div>{{ $signstagedetail->employee }}</div>
            <div>{{ $signstagedetail->order }}</div>
        @endforeach
        </div> 
        <a href="{{ route("signstagedetails.create"); }}">新增簽核關卡</a>
    @endif

   
</body>
</html>