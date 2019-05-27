@extends('layouts.app')
@section('title', '签到记录列表')

@section('content')
<h3>签到记录列表</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">用户</th>
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
            <td>{{ $log->user->id }} - {{ $log->user->name }}</td>
            <td>{{ $log->start_at->toDateTimeString() }}</td>
            <td>{{ $log->end_at->toDateTimeString() }}</td>
            <td>{{ $log->created_at->toDateTimeString() }}</td>
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
    {{ $logs->links() }}
</div>
@stop
