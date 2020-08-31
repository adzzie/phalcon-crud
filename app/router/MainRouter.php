<?php
/**
 * Created by PhpStorm.
 * User: gamalan
 * Date: 07/10/16
 * Time: 10:24
 */

namespace Application\Router;

use Phalcon\Mvc\Router\Group;

class MainRouter extends Group
{
    public function initialize()
    {
        $this->setPaths([
            'namespaces' => 'Application\\Controllers',
//            'controller'=>'index'
        ]);

        $this->add(
            '/',
            [
                'controller' =>'kategori',
            ]
        );


        // Define a route
        $this->add(
            '/:controller',
            [
                'controller' => 1,
                'action'     => 'index'
            ]
        );
        $this->add(
            '/:controller/:action/:params',
            [
                'controller' => 1,
                'action'     => 2,
                'params'     => 3,
            ]
        );

    }
}