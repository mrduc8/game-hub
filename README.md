# 🔐 Laravel Authentication Service

Hệ thống xác thực người dùng xây dựng trên **Laravel**, hỗ trợ:

- Đăng ký / Đăng nhập bằng **username + password**
- Đăng nhập bằng **Google / Facebook / Apple**
- Chuẩn **JWT Access Token + Refresh Token**
- Refresh token rotation & revoke session
- Tuân thủ OAuth2 / OpenID Connect (OIDC)
- Thiết kế phù hợp cho Web SPA & Mobile App

---

# 📌 1. Mục Tiêu Dự Án

Dự án cung cấp một **Auth API độc lập**, có thể dùng làm:

- Backend xác thực cho Web SPA (React / Vue / NextJS)
- Backend xác thực cho Mobile App (iOS / Android / Flutter)
- Microservice Authentication trong hệ thống lớn

Thiết kế tập trung vào:

- Bảo mật
- Chuẩn hóa token
- Dễ mở rộng
- Quản lý session linh hoạt

---

# 🏗 2. Kiến Trúc Tổng Quan

Client (Web/Mobile)  
⬇  
Laravel Auth API  
⬇  
Database  

### Luồng cơ bản

1. User đăng nhập (password hoặc social)
2. Server xác thực
3. Server phát hành:
   - Access Token (JWT, ngắn hạn)
   - Refresh Token (dài hạn)
4. Client dùng Access Token để gọi API
5. Khi Access Token hết hạn → dùng Refresh Token để cấp mới

---

# 🔐 3. Cơ Chế Token

## 3.1 Access Token

- Định dạng: JWT
- Thời hạn: 10–15 phút
- Gửi qua header:


### Claims tiêu chuẩn

- `sub` — user id
- `iss` — issuer
- `aud` — audience
- `iat` — issued at
- `exp` — expiration
- `jti` — unique token id

---

## 3.2 Refresh Token

- Thời hạn: 7–30 ngày
- Dùng để cấp access token mới
- Có thể:
  - Lưu trong HttpOnly cookie (khuyến nghị)
  - Hoặc gửi qua body (mobile API)

### Security Pattern

- Hash refresh token trong database
- Rotation mỗi lần refresh
- Revoke khi logout
- Phát hiện reuse token (nâng cao)

---

# 👤 4. Phương Thức Xác Thực

## 4.1 Username + Password

- Password được hash bằng Bcrypt/Argon2
- Có thể thêm:
  - Rate limiting
  - Lockout policy
  - Password policy

## 4.2 Social Login

### Google
- OAuth2 Authorization Code
- Lấy profile từ Google
- Link hoặc tạo user mới

### Facebook
- OAuth2 Flow
- Xác thực access token từ Facebook

### Apple
- OpenID Connect
- Verify `id_token`
- Kiểm tra:
  - Signature
  - Audience
  - Issuer
  - Expiration

---

# 🗄 5. Thiết Kế Database

### users
- id
- username
- email
- password
- avatar
- timestamps

### user_providers
- user_id
- provider (google/facebook/apple)
- provider_user_id
- created_at

### refresh_tokens (nếu triển khai rotation chuẩn)
- user_id
- token_hash
- issued_at
- expires_at
- revoked_at
- replaced_by

---

# 🔄 6. API Chính

| Endpoint | Mô tả |
|-----------|--------|
| POST /auth/register | Đăng ký |
| POST /auth/login | Đăng nhập |
| POST /auth/refresh | Cấp access token mới |
| POST /auth/logout | Logout |
| GET /auth/google/redirect | Google login |
| GET /auth/facebook/redirect | Facebook login |
| GET /auth/apple/redirect | Apple login |
| GET /me | Lấy thông tin user |

---

# 🔒 7. Bảo Mật

- Access token TTL ngắn
- Refresh token TTL dài
- Rotation refresh token
- Validate OAuth state (CSRF protection)
- Verify id_token với Apple/Google
- CORS allowlist
- HTTPS bắt buộc trong production
- Không lưu token trong localStorage nếu có thể dùng HttpOnly cookie

---

# 🚀 8. Môi Trường & Cấu Hình

Cần cấu hình:

- Database connection
- JWT secret / key
- Google OAuth credentials
- Facebook App credentials
- Apple Sign-In key & team ID
- Frontend URL (để redirect)

---

# 📦 9. Khả Năng Mở Rộng

Có thể mở rộng thêm:

- Email verification
- Forgot/Reset password
- Two-Factor Authentication (2FA)
- Role & Permission
- Device-based session management
- Audit login history

---

# 📖 10. Chuẩn Áp Dụng

- JWT (RFC 7519)
- OAuth2 Authorization Code Flow
- OpenID Connect
- Token Rotation Security Pattern
- Secure Cookie Best Practices

---

# ✅ Trạng Thái

Hệ thống cung cấp nền tảng xác thực hoàn chỉnh cho ứng dụng Laravel, hỗ trợ cả đăng nhập truyền thống và Social Login, với mô hình token bảo mật, phù hợp cho production khi triển khai đúng cấu hình bảo mật.

---
