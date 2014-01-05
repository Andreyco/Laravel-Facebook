<?php namespace Andreyco\LaravelFacebook;

use Config,
    Session;

class Facebook extends \Facebook
{
    /**
     * Provides the implementations of the inherited abstract
     * methods.  The implementation uses PHP sessions to maintain
     * a store for authorization codes, user ids, CSRF states, and
     * access tokens.
     */
    protected function setPersistentData($key, $value)
    {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to setPersistentData.');
            return;
        }

        $session_var_name = $this->constructSessionVariableName($key);
        Session::put($session_var_name, $value);
    }

    protected function getPersistentData($key, $default = false)
    {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to getPersistentData.');
            return $default;
        }

        $session_var_name = $this->constructSessionVariableName($key);
        return Session::get($session_var_name, $default);
    }

    protected function clearPersistentData($key) {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to clearPersistentData.');
            return;
        }

        $session_var_name = $this->constructSessionVariableName($key);
        Session::forget($session_var_name);
    }

    /**
     * Check whether the user likes the page or not.
     *
     * @param integer @pageID Page ID to check against.
     * @return null|bool Returns true if the user likes the page, false if doesn't. Null is returned if the state cannot be determined.
     */
    public function hasLiked($pageId)
    {
        $signedRequest = $this->getSignedRequest();

        if (is_null($signedRequest) || ! array_key_exists('page', $signedRequest)) {
            return null;
        }

        $liked = $signedRequest['page']['liked'];

        return ($signedRequest['page']['id'] == $pageId) ? $liked : false;
    }

    /**
     * Get login URL based on default configuration.
     *
     * @param array $overrides Custom configuration overriding defaults.
     * @return string String representing login URL.
     */
    public function getLoginUrl($overrides = array())
    {
        $params = Config::get('laravel-facebook::login');

        // Merge arrays and allow only predefined keys
        $params = array_intersect_key($overrides + $params, $params);

        return parent::getLoginUrl($params);
    }

    /**
     * Alias for `api('/me')` method call.
     * @param array $fields Fields to retrieve.
     * @return array Array of fields.
     */
    public function me(array $fields = array())
    {
        return $this->api('/me?fields=' . implode(',', $fields));
    }

    public function registrationPlugin($overrides = array())
    {
        $params = Config::get('laravel-facebook::registration');
        $params['client_id'] = Config::get('laravel-facebook::init.appId');
        // encode form fields
        $params['fields'] = json_encode($params['fields']);

        // Merge arrays and allow only predefined keys
        $params = array_intersect_key($overrides + $params, $params);

        $src = $this->getUrl('www', 'plugins/registration', $params);
        return "<iframe src='{$src}' height='400'></iframe>";
    }
}
