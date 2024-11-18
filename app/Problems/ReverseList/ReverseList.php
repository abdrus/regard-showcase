<?php

namespace App\Problems\ReverseList;
use App\Problems\ReverseList\ReverseNode;

class ReverseList
{
    public function solve(ReverseNode $node)
    {
        $previous = null;
        $current = $node;

        while ($current)
        {
            $next = $current->next;
            $current->next = $previous;
            $previous = $current;
            $current = $next;
        }

        return $previous;
    }

}
