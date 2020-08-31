<?php

namespace Application\Models;

class Kategori extends BaseModel
{

    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var string
     */
    public $nama;

    /**
     *
     * @var string
     */
//    public $created_at;

    /**
     *
     * @var string
     */
//    public $modified_at;

    /**
     *
     * @var integer
     */
//    public $is_deleted;

    /**
     *
     * @var string
     */
//    public $deleted_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
//        $this->setSchema("application");
        $this->setSource("kategori");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Kategori[]|Kategori|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Kategori|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'kategori';
    }

}
