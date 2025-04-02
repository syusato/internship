<?php
use \Model\Articles;

class Controller_Articles extends Controller
{
    //データの挿入
    public function action_insert()
    {
        Articles::insert();

        return Response::redirect("home/index");
    }

    //更新
    public function action_update($id)
    {
        Articles::update($id);

        return Response::redirect("home/index");
    }

    //削除
    public function action_delete($id)
    {
        Articles::delete($id);

        return Response::redirect("home/index");
    }
}