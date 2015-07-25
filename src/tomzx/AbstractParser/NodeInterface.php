<?php

namespace tomzx\AbstractParser;

interface NodeInterface
{
    /**
     * @return NodeInterface[]
     */
    public function getChildren();

    /**
     * @return bool
     */
    public function hasChildren();
}
