# API 定义

## 约定

所有 API 均需要加入 `Token` 头部，用来标识客户端。

## 获取用户列表

本操作返回一个包含用户基本信息的列表。

GET `/api/users`

### 参数

 - page: 分页

### 响应

    {
        "status": 200,
        "total": 10,
        "per_page": 20,
        "data": [
            {
                "id": 1,
                "name": "我叫 XXX",
                "email": "xxx@xxx.xxx",
                "role": "user/manager",
                "fingerprint": "xxxxxxx",
                "mac": "00ff00ff00ff"
            },
            ...
        ]
    }

## 提交签到日志

本操作可以将客户端提交的签到记录数据保存到服务端的数据库中。

POST `/api/logs`

### 参数

    {
        "data": [
            {
                "user_id": 1,
                "start_at": "2019-01-01 11:11:11",
                "end_at": "2019-01-01 11:11:12"
            },
            ...
        ]
    }

### 响应

    {
        "status": 200
    }

## 提交新录入的指纹

本操作可以将客户端录入的指纹特征值存入服务器端

POST `/api/fingerprint`

### 参数

    {
        "request_id": 1,
        "fingerprint": "xxxx"
    }

### 响应

    {
        "status": 200
    }
