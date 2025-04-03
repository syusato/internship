<?php
namespace Model;

class Articles extends \Model
{

	// Read
	
	//webpageのみを抽出
	public static function select_web()
	{

		$webpage = \DB::select()
		->from('articles')
		->where('type', '=', 'webpage')
		->where('user_id' , '=','1')//ユーザID参照
		->execute()
		->as_array();

		return $webpage;

	}

	//paperのみを抽出
	public static function select_paper()
	{

		$paper = \DB::select()
		->from('articles')
		->where('type', '=', 'paper')
		->where('user_id' , '=','1')//ユーザID参照
		->execute()
		->as_array();

		return $paper;

	}

	//toolのみを抽出
	public static function select_tool()
	{

		$tool = \DB::select()
		->from('articles')
		->where('type', '=', 'tool')
		->where('user_id' , '=','1')//ユーザID参照
		->execute()
		->as_array();

		return $tool;

	}

	//指定したidを取り出す
	public static function select_check($id)
	{
		$data = \DB::select()
		->from('articles')
		->where('id', '=', $id)
		->where('user_id' , '=','1')//ユーザID参照
		->execute()
		->as_array();

		return $data;
	}

    public static function insert($title, $url, $comment, $type)
    {
        $now = \Date::forge()->format('%Y-%m-%d %H:%M:%S');
        return \DB::insert('articles')->set(array(
            'title' => $title,
            'url' => $url,
            'comment' => $comment,
			'type' => $type,
            'insert_date' => $now,
            'update_date' => $now,
        ))->execute();
    }

    public static function delete_by_id($id)
    {
        return \DB::delete('articles')->where('id', '=', $id)->execute();
    }

    public static function update_comment($id, $comment)
    {
        return \DB::update('articles')->set([
            'comment' => $comment,
            'update_date' => \Date::forge()->format('%Y-%m-%d %H:%M:%S')
        ])->where('id', '=', $id)->execute();
    }
}
