# Auth Module

## 1. Purpose

Auth module chịu trách nhiệm xác thực và quản lý phiên đăng nhập:

- Username / Password authentication
- Social login (Google, Facebook, Apple)
- Access Token (JWT) issuance
- Refresh Token rotation
- Session revoke / logout
- JWT validation middleware

Auth không quản lý business logic người dùng và không thao tác trực tiếp bảng `users`.

---

## 2. Responsibilities

### Included

- Login
- Refresh token
- Logout / Logout all
- OAuth redirect & callback
- Token issuance & verification
- Refresh token storage (DB)
- Refresh rotation & reuse detection
- Access token middleware validation

### Excluded

- User profile management
- Account lifecycle (disable/enable)
- Username/email uniqueness rules
- Provider linking business rules

---

## 3. Module Structure

- Auth/
- Controllers/
- Services/
- OAuth/
- Repositories/
- Domain/
- Middleware/
- Routes/
- ModuleProviders/
- Database/
- Config/

---

## 4. Token Design

### Access Token

- Format: JWT
- TTL: 10–15 minutes
- Transport:

Authorization: Bearer <access_token>

### Refresh Token

- TTL: 7–30 days
- Stored hashed in `refresh_tokens` table
- Rotated on every refresh
- Revoked on logout
- Reuse detection recommended

---

## 5. Core Flows

### Password Login

1. Receive credentials
2. Call CredentialVerifierContract
3. Validate account status via AccountReaderContract
4. Issue access + refresh token
5. Persist refresh session

---

### Social Login

1. Redirect to provider
2. Receive provider callback
3. Convert to ProviderIdentityDTO
4. Call AccountIdentityResolverContract
5. Issue token pair

---

### Refresh

1. Validate refresh token
2. Check revoked / expired
3. Rotate token
4. Issue new access token

---

## 6. Contracts Used

Auth depends on:

- AccountIdentityResolverContract
- AccountReaderContract
- CredentialVerifierContract (optional)
- SessionRevokerContract (optional)

Auth does not access Account database directly.

---

## 7. Error Codes

### Auth Errors

- AUTH_INVALID_CREDENTIALS
- AUTH_TOKEN_INVALID
- AUTH_TOKEN_EXPIRED
- AUTH_REFRESH_REVOKED
- AUTH_REFRESH_REUSE_DETECTED
- OAUTH_STATE_MISMATCH
- OAUTH_PROVIDER_ERROR

### Error Response Format

{
  "error": {
    "code": "AUTH_INVALID_CREDENTIALS",
    "message": "Invalid credentials"
  }
}

---

## 8. Microservice Readiness

To extract Auth as a standalone service:

- Replace Account contracts with HTTP client implementation
- Keep TokenService unchanged
- Preserve error code contract
- No DB coupling to Account module

---

## 9. Security Requirements

- Short-lived access token
- Hashed refresh token storage
- Rotation on refresh
- Logout revokes session
- OAuth state validation
- HTTPS required in production
- Rate limit login endpoints
