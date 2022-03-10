<?php


class PG_Pagination extends PostsGrid
{


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
      self::$instance = new PG_Pagination();
    }
 
    return self::$instance;
  }

	public static function _debugging(){


		
	}



  // 
  private function __clone(){}
  private function __wakeup(){}

	
}



?>