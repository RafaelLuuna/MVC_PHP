<?php

defined("ROOTPATH") OR exit("Acces denied.");

Class Session {

    public static function startSession() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_start();
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
        $_SESSION = array();
    }

    


}