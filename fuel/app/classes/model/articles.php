<?php
namespace Model;

class Articles extends \Model
{

	// Read
	
	//webpageのみを抽出
	public static function select_web()
	{

		$webpage = \DB::select('*')
		->from('articles')
		->where('type', '=', 'webpage')
		->execute()
		->as_array();

		return $webpage;

	}

	//paperのみを抽出
	public static function select_paper()
	{

		$paper = \DB::select('*')
		->from('articles')
		->where('type', '=', 'paper')
		->execute()
		->as_array();

		return $paper;

	}

	//toolのみを抽出
	public static function select_tool()
	{

		$tool = \DB::select('*')
		->from('articles')
		->where('type', '=', 'tool')
		->execute()
		->as_array();

		return $tool;

	}

	//指定したidを取り出す
	public static function select_check($id)
	{
		$data = \DB::select('*')
		->from('articles')
		->where('id', '=', $id)
		->execute()
		->as_array();

		return $data;
	}

	// Create
	public static function insert()
	{
		// 現在の日時を取得
		$current_date = \Date::forge()->format('%Y-%m-%d %H:%M:%S');
        
		// データの挿入
		\DB::insert('articles')->set(array(
			'title' => \Input::post('title'),
			'url' => \Input::post('url'),
			'comment' => \Input::post('comment'),
			'type' => \Input::post('type'),
			'insert_date' => $current_date,
			'update_date' => $current_date,
			'last_click' => $current_date
		))->execute();

		return;
	}

	//update
	public static function update($id)
	{
		$current_date = \Date::forge()->format('%Y-%m-%d %H:%M:%S');

		\DB::update('articles')
		->set(array(
			'title' => \Input::post('title'),
			'url' => \Input::post('url'),
			'comment' => \Input::post('comment'),
			//'type' => \Input::post('type'),
			//'insert_date' => $current_date,
			'update_date' => $current_date
			//'last_click' => $current_date

		))
		->where('id', '=', $id)
		->execute();

		return;
	}

	//delete
	public static function delete($id)
	{
		$result = \DB::delete('articles')
			->where('id', '=', $id)
			->execute();

		return $result > 0;
	}
}