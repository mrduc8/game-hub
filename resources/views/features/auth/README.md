# Feature: Auth (Views)

## Scope
Chứa toàn bộ view liên quan Auth:
- Login
- Register
- OAuth callback UI (nếu cần)

## Structure
- `pages/`: page theo route
- `partials/`: UI component nội bộ feature

## Pages
- `pages/login.blade.php` -> Route: `/login`
- `pages/register.blade.php` -> Route: `/register`

## Partials
- `partials/oauth-buttons.blade.php`: nút Google/Facebook/Apple
- `partials/auth-form.blade.php`: form dùng chung login/register (nếu áp dụng)

## Dependencies
- Layout: `layouts/auth.blade.php`
- Shared components: `views/shared/components/*`

## How to add new page
1. Tạo file trong `pages/`
2. Thêm route map đúng page
3. Nếu cần JS riêng -> thêm `@vite(...)` tương ứng
