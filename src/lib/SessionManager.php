<?php

namespace Redhood\NotesApp\lib;

class SessionManager {
    public static function init() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function getUserId() {
        return $_SESSION['user_id'] ?? null;
    }

    public static function setUserId($userId) {
        $_SESSION['user_id'] = $userId;
    }

    public static function destroy() {
        session_destroy();
    }
}
