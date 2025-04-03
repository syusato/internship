<?php
use \Model\Articles;

class Controller_Articles extends Controller
{
    //データの挿入
    public function action_insert()
    {
        // review: must
        // モデルの中で\Input::post('title')を使っていますが、コントローラーで取得し、モデルの引数としてデータを渡すようにしましょう
        // データの流れが、view -> controller -> model となるべきですが、現状はview -> model となっています
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