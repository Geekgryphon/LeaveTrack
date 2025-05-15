<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('leaveforms.store') }}">
        <label for="signstage_id">簽核項目</label>
        <select name="signstage_id" id="signstage_id">
            @foreach( $signstages as $signstage)
                <option value="{{ $signstage->code }}" {{ old('signstage_id') == $signstage->code ? 'selected' : '' }}>{{ $signstage->name }}</option>
            @endforeach
        </select>
        <br/>

        <label for="leavebegintime">請假起時</label>
        <input type="datetime" id="leavebegintime" name="leavebegintime" value="{{ old('leavebegintime') }}">
        <br/>

        <label for="leaveendtime">請假迄時</label>
        <input type="datetime" id="leaveendtime" name="leaveendtime" value="{{ old('leaveendtime') }}">
        <br/>

        <label for="reason">請假事由</label>
        <textarea name="reason" id="reason" cols="30" rows="10">
            {{ old('reason') }}
        </textarea>



        <button type="submit">新增請假單</button>
    </form>
</body>
</html>