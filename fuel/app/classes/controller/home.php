<?php
use \Model\Articles;

class Controller_Home extends Controller
{
    //初期画面
    public function action_index()
    {
        $data = array();
        $data['webpage_lists'] = Articles::select_web();
        $data['paper_lists'] = Articles::select_paper();
        $data['tool_lists'] = Articles::select_tool();
        
        return Response::forge(View::forge('welcome/hello',$data));
    }
    //新規追加画面への遷移
    public function action_newaddition()
	{
		$view = View::forge("welcome/newaddition");

    	return $view;
	}
    //戻るボタン
    public function action_back()
    {
      
		return Response::redirect("home/index");
        
    }
    


}