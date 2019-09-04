<?php
namespace Nessmodule\Request\Helpers\Setup\Models;
/**
 * Class Column
 * User: Nessandro
 * Date: 2019-08-30
 * Time: 18:19
 */

class Column
{
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $type;
    /**
     * @var
     */
    protected $size;
    /**
     * @var array
     */
    protected $options = [];
    /**
     * @var
     */
    protected $comment;

    /**
     * @var bool
     */
    protected $isIndex = false;

    /**
     * Column constructor.
     * @param null $name
     * @param null $type
     * @param null $size
     * @param array $option
     * @param null $comment
     */
    public function __construct($name = null, $type = null, $size = null, $option = [], $comment = null)
    {
        $this->setName($name);
        $this->setType($type);
        $this->setSize($size);
        $this->setOptions($option);
        $this->setComment($comment);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type = null)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size = null)
    {
        $this->size = $size;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions($options = null)
    {
        $this->options = $options;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment = null)
    {
        $this->comment = $comment;
    }

    /**
     * @return bool
     */
    public function isIndex()
    {
        return $this->isIndex;
    }

    /**
     * @param bool $isIndex
     */
    public function setIsIndex($isIndex)
    {
        $this->isIndex = $isIndex;
    }


}