<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if(session('success'))
        <x-message :message="session('success')" />
    @endif

    @if($leaveforms->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
        <br/>
        <a href="{{ route('leaveforms.create') }}">新增</a>
    @else
        <h1>有資料啦</h1>
    @endif
</body>
</html>