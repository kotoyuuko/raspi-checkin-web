@extends('layouts.app')
@section('title', '终端列表')

@section('content')
<div class="float-left">
    <h3>终端列表</h3>
</div>
<div class="float-right">
    <a class="btn btn-primary btn-sm" href="{{ route('clients.create') }}">新增</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">名称</th>
            <th scope="col">IP</th>
            <th scope="col">端口</th>
            <th scope="col">Token</th>
            <th scope="col">操作</th>
        </tr>
    </thead>
    <tbody>
        @if (count($clients) > 0)
        @foreach($clients as $client)
        <tr>
            <th scope="row">{{ $client->id }}</th>
            <td>{{ $client->name }}</td>
            <td>{{ $client->ip }}</td>
            <td>{{ $client->port }}</td>
            <td>{{ $client->token }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('clients.edit', $client->id) }}">编辑</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">没有查询到数据</td>
        </tr>
        @endif
    </tbody>
</table>
<div class="float-right">
    {{ $clients->links() }}
</div>
@stop
