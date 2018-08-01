## Setup môi trường dev

1- Cài đặt xampp<br/>
2- Clone sourcecode, checkout develop branch<br/>
3- Config database <br/>
Sửa file .env trong project<br/>
DB_DATABASE=<br/>
DB_USERNAME=<br/>
DB_PASSWORD=<br/>
4- Chạy migration <br/>
Mục đích: tạo các table<br/>
cmd : php arisan db:migrate<br/>
5- Chạy db seed<br/>
Mục đích: để tạo dữ liệu mẫu<br/>
cmd : php artisan db:seed<br/>
6- Khởi động laravel<br/>
cmd : php artisan serve<br/>


## Quản lý source code sử dụng git flow

Branch naming<br/>
Với các feature, đặt tên theo format feature/[issue_no_][feature_code_][feature_short_description]

Với các bugfix, đặt tên theo format bugfix/[issue_no_][bug_short_description]

Nếu không có Issue No hay Feature Code thì bỏ qua.

Commit<br/>
Yêu cầu:<br/>

Commit message phải rõ ràng, phải chứa issue #... nếu có issue tương ứng. Ví dụ: issue #01 fix bug on login.
Add đầy đủ các file/đoạn code liên quan đến commit, không add những phần không liên quan.
Tránh add quá nhiều file trong 1 commit gây khó khăn cho việc review và quản lý source code. Số file tối đa tham khảo: 5.
Merge Request<br/>
Title của Merge Request: tương tự commit message, chú ý điền issue liên quan nếu có.
Nếu Merge Request chưa hoàn thành, cần sửa thêm, chưa sẵn sàng để merge: thêm prefix WIP: (Work In Progress) vào title của Merge Request để tránh bị merge nhầm.