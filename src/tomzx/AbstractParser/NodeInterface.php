<?php

namespace tomzx\AbstractParser;

interface NodeInterface
{
    /**
     * @return \tomzx\AbstractParser\NodeInterface[]
     */
    public function getChildren();

    /**
     * @return bool
     */
    public function hasChildren();
}
