@extends('layouts.app')
@section('title', '录入指纹')

@section('content')
<h3>录入指纹 - 用户 ID: {{ $user->id }}</h3>
<form action="{{ route('users.fingerprint', $user->id) }}" method="POST">
    @csrf

    <div class="form-group row">
        <label for="inputClient" class="col-sm-2 col-form-label">节点</label>
        <div class="col-sm-10">
            <select id="inputClient" class="form-control" name="client">
                @if (count($clients) > 0)
                @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
                @else
                <option value="0">请先添加节点</option>
                @endif
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>
@stop
