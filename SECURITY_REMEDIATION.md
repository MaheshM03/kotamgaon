# 🚨 SECURITY REMEDIATION GUIDE - CRITICAL

**Status**: Site is actively compromised. Immediate action required.
**Date Generated**: May 7, 2026

---

## EXECUTIVE SUMMARY

Your website has been actively compromised with:
- **12+ encrypted backdoor directories** with RCE capabilities
- **Unrestricted file upload vulnerability** allowing arbitrary code injection
- **6 SQL injection vulnerabilities** in authentication functions
- **Insecure password storage** (plaintext + weak double base64)
- **Persistent malicious hooks** loading on every request

---

## 🔴 CRITICAL: IMMEDIATE ACTIONS (DO THIS FIRST)

### 1. **OFFLINE SERVER IMMEDIATELY**
```
Take the site offline NOW to prevent further exploitation
```

### 2. **FORENSIC BACKUP**
- Take a full backup before making any changes (for forensic analysis)
- Store securely offline

### 3. **REMOVE MALICIOUS FILES**
Delete these dangerous directories and files:

```
/brzefmq/                  - RCE backdoor
/cgi-bin/                  - Suspicious directory
/g1xnzrv/                  - RCE backdoor  
/igrptyu/                  - RCE backdoor
/joxinbm/                  - RCE backdoor
/lauzfno/                  - RCE backdoor
/qhlwmiu/                  - RCE backdoor
/rahmwqu/                  - RCE backdoor
/rpt1hmg/                  - RCE backdoor
/shop/                     - Suspicious directory
/spc1itw/                  - RCE backdoor
/uwniqgz/                  - RCE backdoor
/yfedjzk/                  - RCE backdoor
/zldwkef/                  - RCE backdoor

2cb6f93d413868.html        - Malicious payload
2cb6f93d413868.php         - Encrypted RCE
gcegfpxc.php               - File upload + injection
wp-xmlrpc.php              - WordPress backdoor exploit
insc.php                   - Malicious script
readmes.php                - Malicious script
index.php.0                - Backup of compromised file
```

### 4. **CHECK AND SANITIZE ROOT index.php**
Look for any lines loading from `cgi-bin/.kot` or other suspicious paths:
```php
// REMOVE THIS if it exists:
require_once 'cgi-bin/.kot';
// Or any similar dynamic loading patterns
```

---

## 🔧 CODE FIXES ALREADY APPLIED

### ✅ PHP Deprecation Warnings Fixed
- Added `$config` property to `CI_URI` class
- Added `$uri` property to `CI_Router` class  
- Added 12 properties to `CI_Controller` class

### ✅ SQL Injection Vulnerabilities Fixed
All 6 authentication functions in `Mainmodel.php` now use parameterized queries:
- `wish_list_exists()` - Fixed string concatenation
- `check_valid_login()` - Now uses proper where() syntax
- `check_valid_dept_login()` - Now uses proper where() syntax
- `check_valid_author_login()` - Now uses proper where() syntax
- `check_valid_ceo_login()` - Now uses proper where() syntax
- `check_valid_vp_login()` - Now uses proper where() syntax

**Before** (Vulnerable):
```php
$this->db->where("admin_login_id='".$username."'");
// Exploitable: admin' OR '1'='1
```

**After** (Secure):
```php
$this->db->where('admin_login_id', $username);
```

---

## 🛡️ ADDITIONAL SECURITY HARDENING NEEDED

### 1. **Password Security (HIGH PRIORITY)**
**Current**: Double base64 encoding (not encryption) - COMPLETELY INSECURE
**Required**: Use bcrypt or Argon2 hashing

**Replace in Admin.php:**
```php
// OLD (INSECURE):
base64_encode(base64_encode($password))

// NEW (SECURE):
password_hash($password, PASSWORD_BCRYPT)

// For verification:
password_verify($input_password, $stored_hash)
```

### 2. **Remove Cookie-Based Authentication**
**Current**: Passwords stored in cookies for 10 years
**Action**: 
- Remove persistent password cookies
- Use secure session tokens instead
- Set cookie flags: `HttpOnly`, `Secure`, `SameSite=Strict`

### 3. **File Upload Security**
- Implement whitelist of allowed file types
- Store uploads outside web root
- Disable script execution in upload directory
- Validate MIME types server-side

**Apache .htaccess example:**
```apache
<FilesMatch "\.(php|phtml|php3|php4|php5|php6|phps|pht|phtml|phar|inc|hphp|ctp|shtml|phtml5|pht|phps|phar|phpt|pgif|shtml|inc|hphp|ctp|shtml|phtml5)$">
    Order Deny,Allow
    Deny from all
</FilesMatch>

php_flag engine off
```

### 4. **Database Credentials**
- Check `application/config/database.php` for hardcoded credentials
- Use environment variables instead
- Rotate all database passwords immediately

### 5. **Enable mysqli Extension**
Current error: `Call to undefined function mysqli_init()`
- Enable in `php.ini`: uncomment `extension=mysqli`
- Or install: `apt-get install php-mysqli` (Linux)

### 6. **HTTP Security Headers**
Add to `index.php` or `.htaccess`:
```php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
```

### 7. **CodeIgniter Framework Updates**
- Current: CodeIgniter 3.1.10 (EOL 2019)
- Recommended: Migrate to CodeIgniter 4.x
- Minimum: Apply all security patches from official repository

### 8. **Web Application Firewall (WAF)**
- Consider Cloudflare, AWS WAF, or ModSecurity
- Block known attack patterns
- Rate limiting for login attempts

---

## 📋 REMEDIATION CHECKLIST

- [ ] Take site offline
- [ ] Create forensic backup
- [ ] Delete all malicious directories and files (14 locations)
- [ ] Audit and sanitize root `index.php`
- [ ] Verify SQL injection fixes applied correctly
- [ ] Implement bcrypt password hashing
- [ ] Remove persistent authentication cookies
- [ ] Secure file upload functionality
- [ ] Rotate database credentials
- [ ] Enable mysqli PHP extension
- [ ] Add HTTP security headers
- [ ] Configure web server security headers
- [ ] Implement Web Application Firewall
- [ ] Conduct security audit of remaining code
- [ ] Setup intrusion detection
- [ ] Enable detailed logging
- [ ] Schedule CodeIgniter migration

---

## 🔍 FORENSIC INVESTIGATION

Before cleanup, you may want to investigate:
1. **Access logs**: Check when backdoors were installed
2. **File modification dates**: Identify compromise timeline
3. **Database audit**: Check for unauthorized admin accounts
4. **Malware analysis**: Submit suspicious files to VirusTotal

---

## ⚠️ POST-REMEDIATION VERIFICATION

After cleanup:
1. Test all authentication flows
2. Run security scanner (OWASP ZAP, Burp Suite)
3. Check for residual backdoors
4. Verify file permissions (644 for files, 755 for dirs)
5. Test with PHP 8.2+ for compatibility

---

## 📞 NEXT STEPS

1. **Immediate**: Remove malicious files and take offline
2. **Today**: Apply all code fixes
3. **This week**: Implement password security
4. **Next sprint**: Migrate to modern CodeIgniter or alternative framework

---

**Do not restore the site until all critical items are addressed.**

For CodeIgniter security best practices: https://codeigniter.com/user_guide/
For OWASP Top 10: https://owasp.org/www-project-top-ten/
