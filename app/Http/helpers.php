<?php
/**
 * Set a flash message in the session.
 *
 * @param  string $message
 * @return void
 */
function flash($message) {
    session()->flash('message', $message);
}

    function set_active($uri)
{
    return Request::is($uri) ? 'active' : '';
}