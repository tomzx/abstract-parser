<?php

namespace tomzx\AbstractParser;

class NodeVisitorAbstract implements NodeVisitorInterface
{
    public function beforeTraverse(array $nodes)
    {
    }

    public function enterNode(NodeInterface $node)
    {
    }

    public function exitNode(NodeInterface $node)
    {
    }

    public function afterTraverse(array $nodes)
    {
    }
}
