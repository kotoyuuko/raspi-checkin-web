@extends('layouts.app')
@section('title', '指纹录入请求列表')

@section('content')
<h3>指纹录入请求列表</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">用户</th>
            <th scope="col">终端</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
        </tr>
    </thead>
    <tbody>
        @if (count($requests) > 0)
        @foreach($requests as $request)
        <tr>
            <th scope="row">{{ $request->id }}</th>
            <td>{{ $request->user->id }} - {{ $request->user->name }}</td>
            <td>{{ $request->client->id }} - {{ $request->client->name }}</td>
            <td>
                @if ($request->status == 'waiting')
                等待录入
                @elseif ($request->status == 'available')
                可用
                @else
                废弃
                @endif
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('fingerprints.resend') }}">重发请求</a>
                <form action="{{ route('fingerprints.destroy', $request->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">删除</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5">没有查询到数据</td>
        </tr>
        @endif
    </tbody>
</table>
<div class="float-right">
    {{ $requests->links() }}
</div>
@stop
