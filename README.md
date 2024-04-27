# Hướng dẫn cài đặt và cập nhật dự án Laravel

## Cài đặt

1. **Clone dự án từ GitHub:**

   ```bash
   git clone https://github.com/MCK564/php_midterm_exam.git

2. **Cài đặt các composer:**

    composer install

3. **Tạo bản sao của tệp .env:**

    cp .env.example .env

4. **Tạo khóa ứng dụng**

    php artisan key:generate

5. **Thay đổi database nếu cần thiết**

    php artisan migrate

6. **Cài đặt các gói npm**

    npm install

7. **Chạy vite**

    npm run dev
    npm run build

8 **Chạy chương trình**

    php artisan serve



Đây là dự án web/app được phát triển trên
    + framework Laravel version 10.0.
    + 
    + gói start-kit breeze
    + tailwind css
    + thư viện giao diện flowbite 
    + Cơ sở dữ liệu: mysql 8

Yêu cầu:
    - php version > 8.0
    - cài đặt gói cài đặt npm (node packages management)


