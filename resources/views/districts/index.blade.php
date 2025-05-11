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

    @if($districts->isEmpty())
        <div>
            沒有任何參數資料。
        </div>
        <br/>
        <a href="{{ route('districts.create') }}">新增</a>
    @else
        <div>
            <div>
                <div>導覽預留區</div>
            </div>
            <div>
                <div>
                    <div></div>
                    <div>縣市中文名稱</div>
                    <div>鄉鎮中文名稱</div>
                    <div>郵政區號</div>
                    <div>鄉鎮排列順序</div>
                </div>
                <div>
                    @foreach ($districts as $district)
                        <div>
                            <div>
                                <a href="{{ route('districts.edit', $district->id) }}">編輯</a>
                            </div>
                            <div>
                                <form action="{{ route('districts.destroy', $district->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="">
                                        <button type="submit">刪除</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div> {{ $district->city_name }} </div>
                        <div> {{ $district->district_name }} </div>
                        <div> {{ $district->zipcode }} </div>
                        <div> {{ $district->seq }} </div>
                    @endforeach
                </div>
                {{ $districts->links() }} 
                <div>
                    <a href="{{ route('districts.create') }}">新增</a>
                </div>
            </div>
        </div>
    @endif


</body>
</html>