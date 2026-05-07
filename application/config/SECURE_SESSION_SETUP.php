<?php
/**
 * SECURE SESSION CONFIGURATION EXAMPLES
 * 
 * Replace the insecure cookie-based authentication with proper session handling
 * 
 * CRITICAL: Do NOT store passwords in cookies!
 * 
 * Apply these configurations to your CodeIgniter session settings.
 */

// Add to application/config/config.php:

/**
 * Session Variables
 */

// Session driver - use database for better security
$config['sess_driver'] = 'database';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200; // 2 hours, not 10 years!
$config['sess_save_path'] = 'ci_sessions'; // Database table name
$config['sess_match_ip'] = TRUE; // Prevent session hijacking
$config['sess_match_useragent'] = TRUE;
$config['sess_time_to_update'] = 300; // Regenerate session ID every 5 minutes
$config['sess_regenerate_destroy'] = TRUE;

/**
 * CRITICAL COOKIE SETTINGS - Replace in application/config/config.php
 */
$config['cookie_prefix'] = 'kotamgaon_'; // Customize for your app
$config['cookie_domain'] = ''; // Leave empty for current domain
$config['cookie_path'] = '/';
$config['cookie_secure'] = TRUE; // HTTPS only (requires HTTPS on server)
$config['cookie_httponly'] = TRUE; // Prevents JavaScript access - CRITICAL
$config['cookie_samesite'] = 'Strict'; // CSRF protection

/**
 * AUTHENTICATION EXAMPLE - Replace in Admin.php controller
 * 
 * Step 1: Hash password on registration/update
 * Step 2: Verify during login
 * Step 3: Store user ID in session (NOT password)
 */

// In application/config/autoload.php, add:
$autoload['helpers'] = array('password');

// In Admin.php controller login function:
/*
public function login()
{
    if ($this->input->post()) {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        
        // Get user from database - DO NOT select password field for comparison
        $user = $this->mainmodel->get_user_by_username($username);
        
        if ($user && verify_password($password, $user->password_hash)) {
            // LOGIN SUCCESSFUL
            
            // Create secure session - Store ONLY user ID
            $this->session->set_userdata(array(
                'user_id' => $user->id,
                'username' => $user->username,
                'user_role' => $user->role,
                'logged_in' => TRUE
            ));
            
            // Optional: Log successful login for security audit
            log_message('info', 'User ' . $username . ' logged in from ' . $this->input->ip_address());
            
            redirect('admin/dashboard');
        } else {
            // LOGIN FAILED
            $this->session->set_flashdata('error', 'Invalid username or password');
            log_message('warning', 'Failed login attempt for ' . $username . ' from ' . $this->input->ip_address());
            redirect('admin/login');
        }
    }
    
    $this->load->view('admin/login');
}

public function logout()
{
    // Destroy entire session
    $this->session->sess_destroy();
    redirect('home');
}

// Verify user is logged in before accessing admin functions:
public function dashboard()
{
    // Redirect to login if not authenticated
    if (!$this->session->userdata('logged_in')) {
        redirect('admin/login');
    }
    
    // Safe to proceed - user is authenticated
    $this->load->view('admin/dashboard');
}
*/

/**
 * DATABASE SCHEMA - For session storage
 * Run this query on your database:
 */
/*
CREATE TABLE ci_sessions (
    id VARCHAR(128) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    timestamp INT(10) UNSIGNED DEFAULT 0 NOT NULL,
    data BLOB NOT NULL,
    PRIMARY KEY (id),
    KEY ci_sessions_timestamp (timestamp)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
*/

/**
 * DATABASE SCHEMA - For secure user storage
 * Modify your admin_users table to add password_hash:
 */
/*
ALTER TABLE admin_users ADD COLUMN password_hash VARCHAR(255) NOT NULL;
-- Then migrate existing passwords using password_hash() function
-- Then remove the insecure password column and cookie storage
*/

/**
 * MIGRATION SCRIPT - Convert existing passwords to bcrypt
 * 
 * This should be run ONCE to convert all existing plaintext passwords
 * Run in CodeIgniter environment:
 * 
 * $users = $this->db->get('admin_users')->result();
 * foreach ($users as $user) {
 *     $hash = password_hash($user->admin_login_password, PASSWORD_BCRYPT);
 *     $this->db->where('admin_id', $user->admin_id);
 *     $this->db->update('admin_users', array('password_hash' => $hash));
 * }
 */

?>
