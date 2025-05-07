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
        <a href="{{ route("signstagedetails.create"); }}">新增簽核關卡</a>
    @endif

   
</body>
</html>