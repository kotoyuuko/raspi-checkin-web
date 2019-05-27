@extends('layouts.app')
@section('title', '我的签到记录')

@section('content')
<h3>我的签到记录</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">签到时间</th>
            <th scope="col">签退时间</th>
            <th scope="col">记录时间</th>
        </tr>
    </thead>
    <tbody>
        @if (count($logs) > 0)
        @foreach($logs as $log)
        <tr>
            <th scope="row">{{ $log->id }}</th>
            <td>{{ $log->start_at->toDateTimeString() }}</td>
            <td>{{ $log->end_at->toDateTimeString() }}</td>
            <td>{{ $log->created_at->toDateTimeString() }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4">没有查询到数据</td>
        </tr>
        @endif
    </tbody>
</table>
<div class="float-right">
    {{ $logs->links() }}
</div>
@stop
