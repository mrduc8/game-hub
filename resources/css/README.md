# CSS Structure

CSS chia:
- `app.css`: entry
- `shared/`: tokens và component styles
- `features/`: style riêng từng feature

## Shared
- `shared/tokens.css`: màu sắc, spacing, typography (design tokens)
- `shared/components.css`: style cho button/input/modal...

## Features
- `features/auth.css`: style riêng auth pages
- `features/games.css`: style riêng games pages

## Rule
- Không viết inline style trong blade nếu không cần
- Ưu tiên class/component style
- Feature style không override shared một cách bừa bãi
