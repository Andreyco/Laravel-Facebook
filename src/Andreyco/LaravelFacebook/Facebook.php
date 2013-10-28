<?php namespace Andreyco\LaravelFacebook;

class Facebook extends \Facebook
{
    /**
     * Checks to see if the user has "liked" the page by checking a signed request
     * @return int -1 don't know, 0 doesn't like, 1 liked
     */
    public function hasLiked($pageId)
    {
        $signedRequest = $this->getSignedRequest();

        if(is_null($signedRequest) || !array_key_exists('page', $signedRequest)) {
            return null;
        }

        $liked = $signedRequest['page']['liked'];

        return ($signedRequest['page']['id'] == $pageId) ? $liked : false;
    }
}