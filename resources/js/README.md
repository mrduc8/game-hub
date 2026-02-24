# JS Structure

JS chia theo 3 lớp:
- `core/`: hạ tầng
- `shared/`: UI helper dùng chung
- `features/`: logic theo tính năng

## Entry
- `app.js`: bootstrap toàn app (init libs, global handlers)

## Core
- `core/http`: http client wrapper (fetch/axios), interceptors
- `core/config`: env, constants
- `core/utils`: helpers format/date/storage...

## Shared
- `shared/ui`: toast, modal, loading, confirm...
- `shared/components`: dropdown, tabs, etc.

## Features
Mỗi feature có:
- `pages/`: JS entry cho từng page
- `api/`: gọi API backend
- `state/`: state management (nếu có)

## Rule
- Features không import trực tiếp từ feature khác
- Shared không chứa business logic
