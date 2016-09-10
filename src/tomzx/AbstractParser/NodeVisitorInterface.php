<?php

namespace tomzx\AbstractParser;

interface NodeVisitorInterface
{
    /**
     * @param array $nodes
     */
    public function beforeTraverse(array $nodes);

    /**
     * @param \tomzx\AbstractParser\NodeInterface $node
     */
    public function enterNode(NodeInterface $node);

    /**
     * @param \tomzx\AbstractParser\NodeInterface $node
     */
    public function exitNode(NodeInterface $node);

    /**
     * @param array $nodes
     */
    public function afterTraverse(array $nodes);
}
