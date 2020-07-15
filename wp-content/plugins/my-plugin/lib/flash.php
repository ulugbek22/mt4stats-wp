<?php

/**
 * Session Flash Management System
 */
class Flash
{

    const FLASH_KEYS = 'flash_message_stored_keys';
    const SKIP_FLAG = 'skip_flash_clean_up';
    private $xRedirectBy = 'flash';
    private $statusCode = 302;
    private $redirectUrl;

    public static function init()
    {
        if (!defined('FLASH_INIT')) {
            // ensure session is started
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            // clean up flash messages from session on script finishing point
            register_shutdown_function([Flash::class, 'cleanUpFlashMessages']);
            // define flash is initialized
            define('FLASH_INIT', true);
        }
    }

    /**
     * Its a callback for (@register_shutdown_function) which registered in constructor
     */
    public static function cleanUpFlashMessages()
    {
        if (!defined(self::SKIP_FLAG)) {

            if (isset($_SESSION[self::FLASH_KEYS])) {

                //clean flash messages by using stored keys
                foreach ($_SESSION[self::FLASH_KEYS] as $message_key) {
                    unset($_SESSION[$message_key]);
                }

                //then clean stored keys itself
                unset($_SESSION[self::FLASH_KEYS]);
            }
        }
    }

    /**
     * @param string $key flash message key in session storage
     * @param string $message message value
     *
     * @return Flash
     */
    public function message($key, $message)
    {
        $_SESSION[self::FLASH_KEYS][] = $key;
        $_SESSION[$key] = $message;

        //skip cleaning once for redirection
        if (!defined(self::SKIP_FLAG)) {
            define(self::SKIP_FLAG, true);
        }

        return $this;
    }

    /**
     * @param $url
     *
     * @return Flash
     */
    public function redirectLocation($url)
    {
        $this->redirectUrl = $url;
        return $this;
    }

    /**
     * @param $status
     *
     * @return Flash
     */
    public function withStatus($status = 302)
    {
        $this->statusCode = $status;
        return $this;
    }

    /**
     * @param $xRedirectBy
     *
     * @return Flash
     */
    public function redirectBy($xRedirectBy = 'flash')
    {
        $this->xRedirectBy = $xRedirectBy;
        return $this;
    }

    public function redirect()
    {
        if (!isset($this->redirectUrl)) {
            $this->redirectBack();
            return;
        }

        @header("X-Redirect-By: $this->xRedirectBy", true, $this->statusCode);
        @header("Location: $this->redirectUrl", true, $this->statusCode);
        exit();
    }

    public function redirectBack()
    {
        $this->redirectUrl = $_SERVER['HTTP_REFERER'];
        $this->redirect();
    }

}