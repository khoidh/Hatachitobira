## Setup môi trường dev

- Cài đặt xampp
- Clone sourcecode, checkout develop branch
- Config database
Sửa file .env trong project
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
- Chạy migration 
Mục đích: tạo các table
cmd : php arisan db:migrate
- Chạy db seed
Mục đích: để tạo dữ liệu mẫu
cmd : php artisan db:seed
- Khởi động laravel
cmd : php artisan serve


## Quản lý source code sử dụng git flow

- Branch naming
Với các feature, đặt tên theo format feature/[issue_no_][feature_code_][feature_short_description]

Với các bugfix, đặt tên theo format bugfix/[issue_no_][bug_short_description]

Nếu không có Issue No hay Feature Code thì bỏ qua.

- Commit
Yêu cầu:

Commit message phải rõ ràng, phải chứa issue #... nếu có issue tương ứng. Ví dụ: issue #01 fix bug on login.
Add đầy đủ các file/đoạn code liên quan đến commit, không add những phần không liên quan.
Tránh add quá nhiều file trong 1 commit gây khó khăn cho việc review và quản lý source code. Số file tối đa tham khảo: 5.
Merge Request
Title của Merge Request: tương tự commit message, chú ý điền issue liên quan nếu có.
Nếu Merge Request chưa hoàn thành, cần sửa thêm, chưa sẵn sàng để merge: thêm prefix WIP: (Work In Progress) vào title của Merge Request để tránh bị merge nhầm.

## Using Docker
please read instruction in `DOCKER.md`