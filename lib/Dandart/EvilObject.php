<?php
namespace Dandart;

use Exception;

/**
 * This library is Satan
 *
 * @package EvilPHP
 * @author Dan Dart
 **/
class EvilObject
{
    private $_props = [];

    public function defineProperties($props)
    {
        $this->_props = $props;
    }

    /**
     * Where we're going, we don't need chains.
     *
     * @param $object EvilObject
     * @return $this (fluent)
     * @author Dan Dart
     */
    public function mixin(EvilObject $object)
    {
        $this->_props = array_merge($this->_props, $object->_props);
        return $this;
    }

    /**
     * No questions asked.
     * No answers given.
     * 
     * @param $prop string property
     * @param $value mixed value
     * @return void
     * @author Dan Dart
     */
    public function __set($prop, $value)
    {
        $this->_props[$prop] = $value;
    }

    /**
     * What we got, you can have.
     * What we not got, you can not have.
     * - Rubbish koan
     *
     * @param $prop string property
     * @return mixed
     * @author Dan Dart
     */
    public function __get($prop)
    {
        if (!isset($this->_props[$prop]))
            throw new Exception($prop.' does not exist.');
        return $this->_props[$prop];
    }

    /**
     * Who's calling me at this time of night?
     *
     * @param $method string method
     * @param $args array args
     * @return mixed
     * @author Dan Dart
     */
    public function __call($method, $args)
    {
        $method = $this->$method;
        if (!is_callable($method))
            throw new Exception($method.' is not callable.');
        return call_user_func_array($method, $args);
    }
}