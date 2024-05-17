<?php

defined("ROOTPATH") OR exit("Acces denied.");

class Session {

    public static function start() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public static function destroy() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
        }
    }

    public static function get($key, $default = null) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function delete($key) {
        unset($_SESSION[$key]);
    }

    public static function clear() {
        session_unset();
    }

    public static function printData() {
        echo "<br>session_id: ".session_id();
        echo "<br>session_status: ".session_status();
        echo "<br>session_name: ".session_name();
        echo "<br>session_data: ";
        if(isset($_SESSION))show($_SESSION);
    }
    


}