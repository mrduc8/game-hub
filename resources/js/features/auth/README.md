# Feature: Auth (JS)

## Scope
JS cho Auth pages:
- submit login/register
- oauth redirect/callback helpers (nếu có)
- handle validation errors UI

## Structure
- `pages/`: entry JS theo page
- `api/`: gọi backend auth endpoints
- `state/`: auth session state (optional)

## Files
- `pages/login.js`: handler submit login
- `api/auth.api.js`: login/refresh/logout
- `state/auth.store.js`: session state (optional)

## Conventions
- API functions không thao tác DOM trực tiếp
- DOM binding nằm ở `pages/*.js`
