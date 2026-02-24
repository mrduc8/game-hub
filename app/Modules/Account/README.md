# Account Module

## 1. Purpose

Account module quản lý domain người dùng:

- Account creation
- Profile management
- Account status control
- Password policy & hashing
- Provider linking rules
- Identity resolution

Account không phát hành token và không xử lý session.

---

## 2. Responsibilities

### Included

- Register account
- Update profile
- Enable / disable account
- Resolve identity from provider
- Link / unlink provider
- Verify password
- Enforce uniqueness rules

### Excluded

- JWT issuance
- Refresh token handling
- OAuth redirect
- Session storage
- Token validation middleware

---

## 3. Module Structure
- Account/
- Controllers/
- Services/
- Repositories/
- Domain/
- Routes/
- ModuleProviders/
- Database/
- Config/

---

## 4. Domain Models

### Users

- id
- username
- email
- password_hash
- status
- timestamps

### User Providers

- user_id
- provider
- provider_user_id
- created_at

---

## 5. Identity Resolution Flow

resolveFromProvider(ProviderIdentityDTO)

Rule order:

1. Match by provider_user_id
2. If not found → match by email (policy-based)
3. If still not found → create new account
4. Return:

- userId
- created (bool)
- linked (bool)
- status

Auth uses this result to issue tokens.

---

## 6. Password Handling

- Hash with bcrypt or argon2
- Enforce password policy
- Provide verification through CredentialVerifierContract

Auth does not hash or store password directly.

---

## 7. Error Codes

### Account Errors

- ACCOUNT_NOT_FOUND
- ACCOUNT_DISABLED
- ACCOUNT_USERNAME_EXISTS
- ACCOUNT_EMAIL_EXISTS
- ACCOUNT_PROVIDER_CONFLICT

### Error Response Format

{
  "error": {
    "code": "ACCOUNT_DISABLED",
    "message": "Account is disabled"
  }
}

---

## 8. Contracts Exposed

Account provides:

- AccountReaderContract
- AccountIdentityResolverContract
- CredentialVerifierContract

Only DTO objects cross module boundary.

---

## 9. Microservice Readiness

To extract Account as standalone service:

- Expose REST/gRPC matching contract
- Preserve DTO schema
- Preserve error codes
- No change required in Auth business logic

---

## 10. Design Principles

- Domain-driven separation
- Clear module boundaries
- Contract-based interaction
- No cross-module DB access
- Standardized error handling
- Production-ready architecture
