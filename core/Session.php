<?php

declare(strict_types=1);

namespace Core;

class Session
{
    public static function has($key)
    {
        return (bool) static::get($key);
    }

    public static function put($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value)
    {
        return $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();
        session_unset();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', ['expires' => time() - 3600, 'path' => $params['path'], 'domain' => $params['domain']]);
    }

}
