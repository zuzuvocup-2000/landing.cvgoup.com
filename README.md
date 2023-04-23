
# PVI PROJECT

## Yêu cầu dự án

PHP: 7.4
SQL Server Management 2022
Ngoài ra còn có các extension cài đặt Open Server

## Hướng dẫn cấu hình hệ thống

### Hướng dẫn cấu hình tài khoản đăng nhập MS SQL

<a href="https://qthang.net/huong-dan-bat-tai-khoan-sa-trong-sql-server">https://qthang.net/huong-dan-bat-tai-khoan-sa-trong-sql-server</a>

### Về Extension PHP hỗ trợ kết nối SQL Server

- Tải các Extension <a href="https://drive.google.com/open?id=1-1LD7xY2oAKRqDsagFf8G6J-KhLON0zL&authuser=vanh.dev2000%40gmail.com&usp=drive_fs">Tại đây</a>
- Thêm các extension vừa tải vào folder ext theo version PHP. Ví dụ: E:\CVG Open Server\modules\php\PHP_8.1\ext
- Mở file php.ini của Version PHP tương ứng và thêm dòng lệnh sau:

extension  = php_pdo_sqlsrv_81_ts_x64.dll
extension  = php_sqlsrv_81_ts_x64.dll

- Ngoài ra bạn còn phải xóa dấu ; trước câu lệnh extension = intl

### Về composer

Chạy dòng lệnh sau:
- composer install (composer update)
- composer dump-autoload

### Cấu hình config

define('CVG_DB_HOST', 'DESKTOP-5DJ8EQQ');                   // Tên Server
define('CVG_DB_USER', 'vanh');                              // Tài khoản
define('CVG_DB_PASS', '1');                                 // Mật khẩu
define('CVG_DB_NAME', 'pvi2');                              // Tên DB

