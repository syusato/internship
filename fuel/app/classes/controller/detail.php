<?php
use \Model\Articles;

class Controller_Detail extends Controller_Base
{
    public function action_check($id)
    {
        $data = array();
        $data['id'] = $id;

        $data['for_check'] = Articles::select_check($id);

        return Response::forge(View::forge('detail/check', $data));
    }

    public function action_update($id)
    {
        $data = array();
        $data['id'] = $id;

        $data['for_update'] = Articles::select_check($id);

        return Response::forge(View::forge('detail/update', $data));
    }

    public function action_delete($id)
    {
        $data = array();
        $data['id'] = $id;

        $data['for_delete'] = Articles::select_check($id);

        return Response::forge(View::forge('detail/delete', $data));
    }
}