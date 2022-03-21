<?php
/* 

*/
// 


// General singleton class.
class ContentQuery {
  // Hold the class instance.
  private static $instance = null;

  
  // The constructor is private
  // to prevent initiation with outer code.
  private function __construct()
  {
    // The expensive process (e.g.,db connection) goes here.
  }
 
  // The object is created from within the class itself
  // only if the class has no instance.
  public static function getInstance()
  {
    if (self::$instance == null)
    {
      self::$instance = new ContentQuery();
			
    }
 
    return self::$instance;
  }

	public static function buildQueryArgs($fields){
		$args = [
			'post_type' 			=> $fields['query_by'],
			'post_status' 		=> 		'publish',
		];
	}

  // 
  private function __clone(){}
  private function __wakeup(){}
}


class CQ_Filter extends ContentQuery
{
	
}


class CQ_ShowMore extends ContentQuery
{
	
}









// 
?>