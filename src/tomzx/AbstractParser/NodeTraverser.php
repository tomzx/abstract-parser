<?php

namespace tomzx\AbstractParser;

class NodeTraverser implements NodeTraverserInterface
{
    /**
     * @var \tomzx\AbstractParser\NodeVisitorInterface[]
     */
    protected $visitors = [];

    /**
     * @param \tomzx\AbstractParser\NodeVisitorInterface $visitor
     * @return void
     */
    public function addVisitor(NodeVisitorInterface $visitor)
    {
        $this->visitors[] = $visitor;
    }

    /**
     * @param \tomzx\AbstractParser\NodeVisitorInterface $visitor
     * @return void
     */
    public function removeVisitor(NodeVisitorInterface $visitor)
    {
        foreach ($this->visitors as $index => $storedVisitor) {
            if ($storedVisitor === $visitor) {
                unset($this->visitors[$index]);
                return;
            }
        }
    }

    /**
     * @param array $nodes
     * @return array
     */
    public function traverse(array $nodes)
    {
        foreach ($this->visitors as $visitor) {
            if (($return = $visitor->beforeTraverse($nodes)) !== null) {
                $nodes = $return;
            }
        }

        $nodes = $this->traverseArray($nodes);

        foreach ($this->visitors as $visitor) {
            if (($return = $visitor->afterTraverse($nodes)) !== null) {
                $nodes = $return;
            }
        }

        return $nodes;
    }

    /**
     * @param array $nodes
     * @return array
     */
    protected function traverseArray(array &$nodes)
    {
        $replaceNodes = [];
        foreach ($nodes as $index => &$node) {
            if (is_array($node)) {
                $node = $this->traverseArray($node);
            } elseif ($node instanceof NodeInterface) {
                $traverseChildren = true;
                foreach ($this->visitors as $visitor) {
                    $return = $visitor->enterNode($node);
                    if (self::DONT_TRAVERSE_CHILDREN === $return) {
                        $traverseChildren = false;
                    } elseif ($return !== null) {
                        $node = $return;
                    }
                }

                if ($traverseChildren) {
                    $this->traverseArray($node->getChildren());
                }

                foreach ($this->visitors as $visitor) {
                    $return = $visitor->exitNode($node);

                    if (self::REMOVE_NODE === $return) {
                        $replaceNodes[] = [$index, []];
                        break;
                    } elseif (is_array($return)) {
                        $replaceNodes[] = [$index, $return];
                    } elseif ($return !== null) {
                        $node = $return;
                    }
                }
            }
        }

        if ( ! empty($replaceNodes)) {
            while (list($index, $replace) = array_pop($replaceNodes)) {
                array_splice($nodes, $index, 1, $replace);
            }
        }

        return $nodes;
    }
}
