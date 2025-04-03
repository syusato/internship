<?php
use \Model\Articles;

class Controller_Detail extends Controller_Base
{
    //read
    public function action_check($id)
    {
        $data = [];
        $data['id'] = $id;

        $data['for_check'] = Articles::select_check($id);

        return Response::forge(View::forge('detail/check', $data));
    }
}