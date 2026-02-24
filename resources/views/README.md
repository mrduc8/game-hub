# Views Structure

Views được chia theo:
- Layouts: khung trang
- Shared: UI dùng chung
- Features: views theo tính năng
- Pages: trang global

## Layouts
- `layouts/app.blade.php`: layout chính cho dashboard/app
- `layouts/auth.blade.php`: layout cho login/register/oauth

## Shared
- `shared/components`: Blade components `<x-button />`, `<x-input />`
- `shared/partials`: navbar/footer/flash-messages...

## Features
Mỗi feature có:
- `pages/`: page theo route
- `partials/`: section/component riêng feature

Ví dụ:
- `/login` -> `features/auth/pages/login.blade.php`

## Rule
- Không đặt view feature vào `shared/`
- Không đặt shared component vào trong feature
