<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: protos/moder.proto

namespace GRPC\Moder;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>moder.ModerResponse</code>
 */
class ModerResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>bool isTrue = 2;</code>
     */
    protected $isTrue = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $isTrue
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\Moder\GPBMetadata\Moder::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>bool isTrue = 2;</code>
     * @return bool
     */
    public function getIsTrue()
    {
        return $this->isTrue;
    }

    /**
     * Generated from protobuf field <code>bool isTrue = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setIsTrue($var)
    {
        GPBUtil::checkBool($var);
        $this->isTrue = $var;

        return $this;
    }

}

