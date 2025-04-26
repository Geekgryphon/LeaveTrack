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

    @if($jobexprs->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
        <br/>
        <a href="{{ route('jobexprs.create') }}">新增</a>
    @else
        <div>
            <div>
                <div>導覽預留區</div>
            </div>
            <div>
                <div>
                    <div></div>
                    <div>職員職編</div>
                    <div>就職時間</div>
                    <div>離職時間</div>
                    <div>職位名稱</div>
                </div>
                <div>
                    @foreach ($jobexprs as $jobexpr)
                        <div>
                            <div>
                                <a href="{{ route('jobexprs.edit', $jobexpr->id) }}">編輯</a>
                            </div>
                            <div>
                                <form action="{{ route('jobexprs.destroy', $jobexpr->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="">
                                        <button type="submit">刪除</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div> {{ $jobexpr->employee_id }} </div>
                        <div> {{ $jobexpr->begindate }} </div>
                        <div> {{ $jobexpr->enddate }} </div>
                        <div> {{ $jobexpr->description }} </div>
                    @endforeach
                </div>
                <div>
                    <a href="{{ route('jobexprs.create') }}">新增</a>
                </div>
            </div>
        </div>
    @endif


</body>
</html>