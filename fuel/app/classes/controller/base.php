<?php

class Controller_Base extends Controller
{
    public function before()
    {
        parent::before();

        if (!Auth::check()) {
            \Response::redirect('/login/index');
        }
    }
}
