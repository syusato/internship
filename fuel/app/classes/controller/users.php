<?php
use \Model\Users;

class Controller_Users extends Controller
{
    public function action_insert()
    {
        Users::insert();

        return Response::redirect("login/index");
    }
}