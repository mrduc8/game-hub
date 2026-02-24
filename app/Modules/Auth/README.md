Auth module chịu trách nhiệm:

Xác thực người dùng

Đăng nhập username/password

Social login (Google / Facebook / Apple)

Phát hành Access Token & Refresh Token

Refresh rotation & revoke session

Validate JWT cho API

Auth không quản lý profile user, không xử lý business logic tài khoản.

🧩 Phạm vi trách nhiệm
Thuộc Auth

Login

Refresh token

Logout / Logout-all

OAuth redirect + callback

Issue & verify JWT

Session store (refresh token DB)

Middleware xác thực access token

Không thuộc Auth

Update profile

Account lifecycle (disable, activate)

Username/email uniqueness rules

Provider linking business rule

📂 Cấu trúc thư mục
Auth/
  Controllers/
  Services/
  OAuth/
  Repositories/
  Domain/
  Middleware/
  Routes/
  ModuleProviders/
  Database/
🔐 Token Strategy
Access Token

JWT

TTL: 10–15 phút

Gửi qua:

Authorization: Bearer <access_token>
Refresh Token

TTL: 7–30 ngày

Lưu hash trong bảng refresh_tokens

Rotation mỗi lần refresh

Revoke khi logout

🔄 Luồng xử lý
1️⃣ Login bằng password

AuthService nhận request

Gọi AccountContract để verify identity

TokenService issue access + refresh

SessionService lưu refresh token hash

2️⃣ Social Login

OAuthController → redirect provider

Callback → OAuthService

Provider adapter trả về ProviderIdentityDTO

Gọi AccountIdentityResolverContract

Issue token pair

3️⃣ Refresh

Validate refresh token

Kiểm tra revoked

Revoke token cũ

Issue token mới

🔌 Contract phụ thuộc vào Account

Auth sử dụng các interface sau:

AccountIdentityResolverContract

AccountReaderContract

(Optional) CredentialVerifierContract

(Optional) SessionRevokerContract

Auth không truy cập trực tiếp bảng users.

🚨 Exception Codes
Auth Errors

AUTH_INVALID_CREDENTIALS

AUTH_TOKEN_EXPIRED

AUTH_TOKEN_INVALID

AUTH_REFRESH_REVOKED

AUTH_REFRESH_REUSE_DETECTED

OAuth Errors

OAUTH_STATE_MISMATCH

OAUTH_PROVIDER_ERROR

Tất cả trả về JSON chuẩn:

{
  "error": {
    "code": "AUTH_INVALID_CREDENTIALS",
    "message": "Invalid credentials"
  }
}
🧱 Sẵn sàng Microservice

Để tách thành service riêng:

Thay binding AccountContract → HTTP client

Giữ nguyên TokenService

Giữ nguyên error contract

Không cần đổi business logic nội bộ.
