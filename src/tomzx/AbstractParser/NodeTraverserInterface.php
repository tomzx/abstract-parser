<?php

namespace tomzx\AbstractParser;

interface NodeTraverserInterface
{
    const DONT_TRAVERSE_CHILDREN = 1;
    const REMOVE_NODE = false;

    /**
     * @param \tomzx\AbstractParser\NodeVisitorInterface $visitor
     * @return void
     */
    public function addVisitor(NodeVisitorInterface $visitor);

    /**
     * @param \tomzx\AbstractParser\NodeVisitorInterface $visitor
     * @return void
     */
    public function removeVisitor(NodeVisitorInterface $visitor);

    /**
     * @param array $nodes
     * @return array
     */
    public function traverse(array $nodes);
}
