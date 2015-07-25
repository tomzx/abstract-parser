<?php

namespace tomzx\AbstractParser;

interface NodeTraverserInterface
{
    const DONT_TRAVERSE_CHILDREN = 1;
    const REMOVE_NODE = false;

    public function addVisitor(NodeVisitorInterface $visitor);

    public function removeVisitor(NodeVisitorInterface $visitor);

    public function traverse(array $nodes);
}
