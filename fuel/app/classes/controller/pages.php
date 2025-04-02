<?php
use \Model\Articles;

class Controller_Pages extends Controller
{
    public function action_view($page = null, $id)
    {

        $data = array();
        $data['id'] = $id;
        $data['for_check'] = Articles::select_check($id);
        $data['for_update'] = Articles::select_check($id);
        $data['for_delete'] = Articles::select_check($id);


        // サポートしているページのリスト
        $valid_pages = ['check', 'delete', 'update'];

        if (in_array($page, $valid_pages)) {
            // 有効なページの場合、ビューを返す
            return Response::forge(View::forge('detail/' . $page, $data));
        }

        // 無効なページの場合、エラーメッセージを返す
        return Response::forge('ページが見つかりません。', 404);
    }
}
