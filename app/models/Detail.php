<?php
class Detail extends  Eloquent
{
		protected $table = 'details';

		public $timestamps = false;

		protected $fillable = ['firstname','lastname','nickname','phonenumber','age'];
		//public static $pages = 2;

		public static $rules = [	'firstname' => 'required', 
    								'lastname' => 'required',
    								'nickname' => 'required',
    								'phonenumber' => 'required',
    								'age' => 'required',		
    						];


		public function users()
	{
		
        return $this->belongsToMany('User');
	}

		
		
}