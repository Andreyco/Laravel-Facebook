<?php namespace Andreyco\LaravelFacebook;

class Facebook extends \Facebook
{
    /**
     * Check whether the user likes the page or not.
     *
     * @param integer @pageID Page ID to check against.
     *
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
}
