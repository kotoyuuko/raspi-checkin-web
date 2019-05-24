@extends('layouts.app')
@section('title', (isset($client) ? '编辑' : '新增') . '终端')

@section('content')
<h3>{{ isset($client) ? '编辑' : '新增'}}终端</h3>

<form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST">
    @if (isset($client))
    @method('PUT')
    @endif

    @csrf

    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">名称</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputName" placeholder="名称" @if (isset($client))
                value="{{ old('name', $client->name) }}" @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputIP" class="col-sm-2 col-form-label">IP</label>
        <div class="col-sm-10">
            <input type="text" name="ip" class="form-control" id="inputIP" placeholder="IP" @if (isset($client))
                value="{{ old('ip', $client->ip) }}" @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputPort" class="col-sm-2 col-form-label">端口</label>
        <div class="col-sm-10">
            <input type="text" name="port" class="form-control" id="inputPort" placeholder="端口" @if (isset($client))
                value="{{ old('port', $client->port) }}" @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputToken" class="col-sm-2 col-form-label">Token</label>
        <div class="col-sm-10">
            <input type="text" name="token" class="form-control" id="inputToken" placeholder="Token （留空将随机生成）" @if (isset($client))
                value="{{ old('token', $client->token) }}" @endif>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    </div>
</form>
@stop
