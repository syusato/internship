<?php
use Model\Articles;


class Controller_Api_Detail extends Controller_Rest
{
    public function delete_delete($id)
    {
        $success = Articles::delete($id);

        if ($success) {
            return $this->response(['status' => 'success']);
        } else {
            return $this->response(['status' => 'not found'], 404);
        }
    }

    public function post_track_click($id)
    {
        $now = Date::forge()->format('%Y-%m-%d %H:%M:%S');

        \DB::update('articles')
            ->set(['last_click' => $now])
            ->where('id', '=', $id)
            ->execute();

        return $this->response(['status' => 'ok']);
    }

    // Controller_Api_Detail.php

    public function post_update_comment($id)
    {
        $comment = Input::post('comment');

        \DB::update('articles')
            ->set([
                'comment' => $comment,
            ])
            ->where('id', '=', $id)
            ->execute();

        return $this->response(['status' => 'success']);
    }



}
