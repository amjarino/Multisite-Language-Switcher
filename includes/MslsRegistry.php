<?php
/**
 * MslsRegistry
 * @author Dennis Ploetner <re@lloc.de>
 * @since 0.9.8
 */

/**
 * Registry instead of singletons
 * @package Msls
 * @subpackage Main
 */
class MslsRegistry {

    /**
     * Generic container
     * @var array
     */
    private static $arr = array();

    /**
     * Instance
     * @var MslsRegistry
     */
    private static $instance;

    /**
     * Constructor
     * 
     * Don't call me directly!
     */
    final private function __construct() { }

    /**
     * Clone
     * 
     * Don't call me directly!
     */
    final private function __clone() { }

    /**
     * Get an object by key
     * @param mixed $key
     * @return mixed
     */
    private function get( $key ) {
        return( isset( $this->arr[$key] ) ? $this->arr[$key] : null );
    }

    /**
     * Set an object
     * @param mixed $key
     * @param mixed $instance
     */
    private function set( $key, $instance ) {
        $this->arr[$key] = $instance;
    }

    /**
     * Registry is a singleton
     * @return mixed
     */
    public static function singleton() {
        if ( !isset( self::$instance ) )
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * Static get_object calls getW
     * @param mixed $key
     * @return mixed
     */
    public static function get_object( $key ) {
        return self::singleton()->get( $key );
    }

    /**
     * Static set_object calls set
     * @param mixed $key
     * @param mixed $instance
     */
    public static function set_object( $key, $instance ) {
        self::singleton()->set( $key, $instance );
    }

}
