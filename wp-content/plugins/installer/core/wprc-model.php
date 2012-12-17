<?php
class WPRC_Model
{
    protected $wpdb = null;
    
    // Singleton
    private static $instance=null;
    
    public static function getInstance()
    {
        if (self::$instance===null)
            self::$instance=new WPRC_Model();
        return self::$instance;
    }
    
    function __construct()
    {
        global $wpdb;

        $this->wpdb = $wpdb;
    }

    public function getWPDB()
    {
        return $this->wpdb;
    }
}
?>