<?php

namespace Application\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;

class BaseModel extends Model {

	public $timestamp = false;
	public $userstamp = false;
	public $softdelete = false;
	public $is_uuid = true;
	//
	public $is_deleted;
	public $created_at;
	public $modified_at;
	public $deleted_at;

	public static function find( $parameters = null ) {
		return parent::find( $parameters );
	}

	public static function findFirst( $parameters = null ) {
		return parent::findFirst( $parameters );
	}

	public function beforeValidationOnCreate() {
	    if ($this->is_uuid){
            $random = new \Phalcon\Security\Random();
            $this->id = $random->uuid();
        }

	}

	public function beforeCreate(){
        $time = date("Y-m-d H:i:s",time());
        $this->created_at  = $time;
        $this->modified_at = $time;
    }

//	public function beforeValidationOnUpdate() {
//		if ( $this->timestamp && empty( $this->is_deleted ) ) {
//			$this->modified_at = date("Y-m-d H:i:s",time());
//		} else {
//			$this->deleted_at = date("Y-m-d H:i:s",time());
//		}
//	}

	public function beforeUpdate(){
	    $this->modified_at = date("Y-m-d H:i:s",time());
    }

	public function softdelete() {
		$this->is_deleted = 1;
		$this->update();
	}

}
