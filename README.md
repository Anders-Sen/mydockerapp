# My Docker App

Docker を使用して構築した Web アプリケーションです。

Nginx・PHP・MySQL・Node.js を docker-compose で管理しています。

---

## 使用技術

* Docker
* Docker Compose
* Nginx
* PHP 8.3
* MySQL 8.0
* Node.js

---

## 機能

* PHPログイン画面
* MySQLユーザー認証
* Node.js API
* Nginx リバースプロキシ

---

## 起動方法

```bash
docker compose up -d
```

---

## アクセス

### PHP

```text
http://localhost/login.php
```

### Node.js API

```text
http://localhost/api/users
```

---

## 停止方法

```bash
docker compose down
```

---

## 作成者

Yuken
