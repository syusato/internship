<?php
use \Model\Articles;

class Controller_Articles extends Controller
{
    //データの挿入

    public function action_insert()
    {
        if (Input::method() == 'POST') {
            $title = Input::post('title');
            $url = Input::post('url');
            $comment = Input::post('comment');
            $type = Input::post('type');

            Articles::insert($title, $url, $comment, $type);
            return Response::redirect('home/index');
        }

        return View::forge('welcome/newaddition');
    }


    //更新
    public function action_update($id)
    {
        // POSTなら更新処理
        if (Input::method() == 'POST') {
            $comment = Input::post('comment');

            // モデル側に更新処理を任せる
            Model\Articles::update_comment($id, $comment);

            // 完了後にリダイレクト
            return Response::redirect('detail/chech');
        }

        return View::forge('detail/check');

    }

    //削除
    public function action_delete($id)
    {
        Articles::delete_by_id($id);

        return Response::redirect("home/index");
    }
}