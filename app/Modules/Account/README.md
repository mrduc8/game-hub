🎯 Mục tiêu

Account module quản lý:

User domain

Tạo tài khoản

Hồ sơ cá nhân

Provider linking rules

Trạng thái account (active/disabled)

Username/email uniqueness

Account không phát hành token và không xử lý session.

🧩 Phạm vi trách nhiệm
Thuộc Account

Register user

Update profile

Disable/enable account

Resolve user từ provider identity

Link/unlink provider

Không thuộc Account

JWT

Refresh token

OAuth redirect

Token validation middleware

📂 Cấu trúc thư mục
Account/
  Controllers/
  Services/
  Repositories/
  Domain/
  Routes/
  ModuleProviders/
  Database/
👤 Domain Models
Users

id

username

email

password_hash

status

timestamps

User Providers

user_id

provider (google/facebook/apple)

provider_user_id

created_at

🔄 Identity Resolution Flow

resolveFromProvider(ProviderIdentityDTO)

Quy tắc:

Tìm theo provider_user_id

Nếu chưa có:

Match email (nếu policy cho phép)

Nếu chưa tồn tại:

Tạo user mới

Trả về:

userId

created (bool)

linked (bool)

status

Auth sẽ dựa vào kết quả này để issue token.

🔐 Password Handling

Password policy & hash logic nằm trong Account.

Hash bằng bcrypt/argon2

Verify password khi Auth gọi qua contract

🚨 Exception Codes
Account Errors

ACCOUNT_DISABLED

ACCOUNT_NOT_FOUND

ACCOUNT_USERNAME_EXISTS

ACCOUNT_EMAIL_EXISTS

ACCOUNT_PROVIDER_CONFLICT

Tất cả lỗi phải throw DomainException với:

errorCode

httpStatus

publicMessage

🔌 Contract cung cấp cho Auth

Account expose:

AccountReaderContract

AccountIdentityResolverContract

(Optional) CredentialVerifierContract

Không expose Eloquent model ra ngoài module.

🧱 Sẵn sàng Microservice

Để tách thành service riêng:

Expose REST API theo contract

Giữ nguyên DTO & error code

Auth module chỉ thay implementation binding
