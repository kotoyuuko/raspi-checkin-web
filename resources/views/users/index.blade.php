@extends('layouts.app')
@section('title', '用户列表')

@section('content')
<h3>用户列表</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">姓名</th>
            <th scope="col">Email</th>
            <th scope="col">指纹</th>
            <th scope="col">设备 MAC 地址</th>
            <th scope="col">角色</th>
            <th scope="col">操作</th>
        </tr>
    </thead>
    <tbody>
        @if (count($users) > 0)
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->fingerprint ? '已设置' : '未设置' }}</td>
            <td>{{ $user->mac ?? '未录入' }}</td>
            <td>{{ $user->role == 'manager' ? '管理员' : '用户' }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">编辑</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7">没有查询到数据</td>
        </tr>
        @endif
    </tbody>
</table>
<div class="float-right">
    {{ $users->links() }}
</div>
@stop
