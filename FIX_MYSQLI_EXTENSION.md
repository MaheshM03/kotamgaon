# 🔧 FIX: mysqli Extension Not Found

## Error
```
Call to undefined function mysqli_init()
File: system/database/drivers/mysqli/mysqli_driver.php
Line: 135
```

## Root Cause
The PHP `mysqli` extension is not installed or enabled on your server.

---

## ✅ SOLUTION

### Option 1: Linux/Ubuntu Server (Most Common)

**Step 1: Install mysqli extension**
```bash
sudo apt-get update
sudo apt-get install php-mysqli
```

**Step 2: Enable the extension**
```bash
sudo phpenmod mysqli
```

**Step 3: Restart web server**
```bash
sudo systemctl restart apache2
# OR for Nginx with PHP-FPM:
sudo systemctl restart php-fpm
sudo systemctl restart nginx
```

**Step 4: Verify installation**
```bash
php -m | grep mysqli
# Should output: mysqli
```

---

### Option 2: CentOS/RHEL Server

```bash
sudo yum install php-mysqli
sudo systemctl restart httpd
```

---

### Option 3: Windows Server / Local Development

**If using XAMPP:**
1. Open `xampp\php\php.ini`
2. Find the line: `;extension=mysqli`
3. Remove the semicolon: `extension=mysqli`
4. Save the file
5. Restart Apache from XAMPP Control Panel

**If using WAMP:**
1. Click WAMP System Tray → PHP → PHP Extensions
2. Check `mysqli` to enable it
3. Service restarts automatically

**If using Laragon:**
1. Click Menu → PHP → Extensions
2. Enable `mysqli`

---

### Option 4: Docker / Container

Add to your Dockerfile:
```dockerfile
RUN docker-php-ext-install mysqli
```

Or in docker-compose.yml:
```yaml
services:
  php:
    image: php:8.1-apache
    environment:
      - PHP_EXTENSIONS=mysqli pdo pdo_mysql
```

---

## 🔍 How to Verify It's Fixed

### Check via PHP CLI:
```bash
php -m | grep mysqli
```

Should output: `mysqli`

### Check via Web Browser:
Create a test file `test_mysqli.php`:
```php
<?php
if (extension_loaded('mysqli')) {
    echo "✅ mysqli is installed and enabled!";
} else {
    echo "❌ mysqli is NOT enabled";
}
phpinfo();
?>
```

Then visit: `http://your-domain.com/test_mysqli.php`

### Check in CodeIgniter:
Visit your app homepage - the error should be gone.

---

## ⚠️ If Still Not Working

### Clear OpCache (if enabled):
```bash
# If OpCache is enabled, restart to clear cache
sudo systemctl restart apache2
# or
sudo systemctl restart php-fpm
```

### Check PHP Configuration:
```bash
php -i | grep mysqli
# or
php -i | grep "mysqli"
```

### Check if compiled with MySQLi support:
```bash
php -i | grep "MySQLi support"
# Should show: "MySQLi support => enabled"
```

### Check php.ini location:
```bash
php -i | grep "php.ini"
# Shows which php.ini file is being used
```

---

## 🆘 Hosting Provider Assistance

If you're on shared hosting and can't install extensions, contact your hosting provider:
- **Tell them**: "I need the PHP mysqli extension enabled for my application"
- **They will**: Enable it in the server configuration

Most reputable hosts have it enabled by default.

---

## 📋 Alternative: Switch to PDO (If mysqli unavailable)

**As a last resort**, you can modify CodeIgniter to use PDO instead.

Edit `application/config/database.php`:
```php
$db['default'] = array(
    'dsn'	=> 'mysql:host=localhost;dbname=your_database',
    'hostname' => 'localhost',
    'username' => 'your_user',
    'password' => 'your_password',
    'database' => 'your_database',
    'dbdriver' => 'pdo',  // Change from 'mysqli' to 'pdo'
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
```

**However**: This requires PDO to be enabled instead, which may not be available if mysqli isn't.

---

## 📞 Quick Checklist

- [ ] Install/enable mysqli extension
- [ ] Restart web server
- [ ] Verify with `php -m | grep mysqli`
- [ ] Test in browser
- [ ] If still failing, check php.ini location and configuration
- [ ] Contact hosting provider if needed
- [ ] Delete `test_mysqli.php` when done

---

## Expected Result After Fix

When you refresh your application, you should see:
- ✅ No "Call to undefined function mysqli_init()" error
- ✅ Application loads normally
- ✅ Database queries work
- ✅ Login/authentication functions work

---

**This is a server issue, NOT a code issue. Once mysqli is enabled, everything will work.**
