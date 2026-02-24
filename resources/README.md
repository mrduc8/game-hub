# Frontend Architecture (Resources)

Frontend được tổ chức theo kiến trúc **feature-based** để dễ mở rộng và quản lý.

## Mục tiêu
- Mỗi tính năng (auth/games/profile/...) tự quản toàn bộ UI + JS + CSS
- Shared UI tách riêng để tái sử dụng
- Core tách riêng cho hạ tầng (http/config/utils)
- Quy ước rõ ràng: 1 route => 1 page view + page JS entry

## Folder Map

### `resources/views`
- `layouts/`: layout khung trang (app/auth)
- `shared/`: blade components/partials dùng chung
- `features/`: views theo tính năng (auth/games/profile/...)
- `pages/`: trang global/special (welcome/errors)

### `resources/js`
- `app.js`: entry toàn app, bootstrap shared
- `core/`: http client, env config, utils
- `shared/`: UI helpers, shared JS components
- `features/`: JS theo feature (pages/api/state)

### `resources/css`
- `app.css`: entry toàn app
- `shared/`: tokens + style components
- `features/`: css riêng từng feature

## Conventions
- Route `/x` => View `views/features/<feature>/pages/<page>.blade.php`
- Page cần JS riêng => `@vite('resources/js/features/<feature>/pages/<page>.js')`
- Shared component => đặt ở `views/shared/components`
- Không import chéo giữa features

## Add New Feature
1. Tạo folder:
   - `views/features/<feature>/pages`
   - `views/features/<feature>/partials`
   - `js/features/<feature>/pages`
   - `js/features/<feature>/api`
   - `js/features/<feature>/state`
   - `css/features/<feature>.css`
2. Tạo README.md cho feature theo template.
3. Tạo page view + page js entry.
