@extends('layouts.app')
@section('title', '编辑用户')

@section('content')
<h3>编辑用户 - ID: {{ $user->id }}</h3>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">姓名</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputName" placeholder="姓名"
                value="{{ old('name', $user->name) }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"
                value="{{ old('email', $user->email) }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputMac" class="col-sm-2 col-form-label">设备 MAC 地址</label>
        <div class="col-sm-10">
            <input type="text" name="mac" class="form-control" id="inputMac" placeholder="设备 MAC 地址"
                value="{{ old('mac', $user->mac) }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    </div>
</form>
@stop
