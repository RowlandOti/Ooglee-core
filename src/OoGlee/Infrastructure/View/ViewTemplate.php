<?php namespace Ooglee\Infrastructure\View;

use Illuminate\Support\Collection;

/**
 * Class ViewTemplate --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */
class ViewTemplate extends Collection
{

    /**
     * Set a value.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->put($key, $value);

        return $this;
    }
}
