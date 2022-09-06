1. Thư mục app
Thư mục app chứa tất cả các Class của project

2. Thư mục app/Console
Thư mục chứa các tập tin định nghĩa các câu lệnh trên artisan

3. Thư mục app/Exceptions
Thư mục chứa các tập tin quản lý, điều hướng lỗi

4. Thư mục app/Http/Controllers
Thư mục chứa các controller của project

5. Thư mục app/Http/Middleware
Thư mục chứa các tập tin lọc và ngăn chặn các requests

6. Thư mục app/Providers
Thư mục chứa các file thực hiện việc khai báo service và bind vào trong Service Container

7. Thư mục app/Models
Thư mục chứa các model của project (Với Laravel 8 sẽ có sẵn thư mục Models)

8. Thư mục bootstrap
Thư mục chứa những file khởi động của framework và những file cấu hình auto loading, route, và file cache

9. Thư mục config
Thư mục chứa tất cả những file cấu hình

10. Thư mục database
Thư mục chứa 2 thư mục migration (tạo và thao tác database) và seeds (tạo dữ liệu mẫu)

11. Thư mục database/factories
Thư mục chứa các file định nghĩa các cột bảng dữ liệu để tạo ra các dữ liệu mẫu

12. Thư mục database/migrations
Thư mục chứa các file tạo và chỉnh sửa dữ liệu

13. Thư mục database/seeds
Thư mục chứa các file tạo dữ liệu thêm vào CSDL

14. Thư mục public
Thư mục chứa file index.php giống như cổng cho tất cả các request vào project, bên trong thư mục còn chứa file JavaScript, và CSS

15. Thư mục resources
Thư mục chứa những file view và raw, các file biên soạn như LESS, SASS, hoặc JavaScript. Ngoài ra còn chứa tất cả các file language trong project.

16. Thư mục resources/views
Thư mục chứa các file view xuất giao diện người dùng

17. Thư mục routes
Thư mục chứa tất cả các điều khiển route (đường dẫn) trong project.

18. Chứa các file route sẵn có: web.php, channels.php, api.php, và console.php

19. Thư mục routes/api.php
Cấu hình các route liên quan đến API

20. Thư mục routes/web.php
Cấu hình các route liên quan đến web (Có giao diện người dùng)

21. Thư mục storage
Thư mục chứa các file biên soạn blade templates của bạn, file based sessions, file caches, và những file sinh ra từ project.

22. Thư mục app, dùng để chứa những file sinh ra từ project.
Thư mục framework, chứa những file sinh ra từ framework và caches.
Thư mục logs, chứa những file logs.
Thư mục /storage/app/public, lưu những file người dùng tạo ra như hình ảnh.
Thư mục tests
Thư mục chứa những file tests

23. Thư mục vendor
Thư mục chứa các thư mục, file thư viện của Composer

File .env
File chứa các config chính của Laravel

File artisan
File thực hiện lệnh của Laravel

File .gitattributes, .gitignore
File dùng để xử lý git

File composer.json, composer.lock, composer-setup.php
File sinh ra của composer

File package.json
File chứa các package cần dùng cho projects

File phpunit.xml
File phpunit.xml, xml của phpunit dùng để testing project

File webpack.mix.js
File dùng để build các webpack