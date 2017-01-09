<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

class Trie {

    public $count = 0;
    public $letter = null;
    public $children = [];

    public function add(string $word) : void
    {
        if (strlen($word) === 0) {
            return;
        }

        $letter = $word[0];
        if (!isset($this->children[$letter])) {
            $this->children[$letter] = new self;
            $this->children[$letter]->letter = $letter;
        }
        $this->children[$letter]->add(substr($word, 1));
        $this->children[$letter]->count++;
    }

    public function find(string $partial) : ? self
    {
        $length = strlen($partial);
        if ($length === 0) {    // on root
            return null;
        }

        $letter = $partial[0];

        if (!isset($this->children[$letter])) {
            return null;
        }

        $nextPartial = substr($partial, 1);

        if (strlen($nextPartial) === 0) {
            return $this->children[$letter];
        }

        return $this->children[$letter]->find($nextPartial);
    }
}

/**
 * Class CountContacts
 * @package wiese\HackerrankSkeleton
 */
class CountContacts
{
    protected $indexStartBeginning = [];
    /**
     * @var Trie
     */
    protected $rootTrie = null;

    public function implementation(array $queryStrings) : array
    {
        $matches = [];
        $this->rootTrie = new Trie();

        foreach ($queryStrings as $query) {
            list($type, $value) = explode(' ', $query);

            switch ($type) {
                case 'add':
                    $this->add($value);
                    break;
                case 'find':
                    $matches[] = $this->find($value);
                    break;
            }
        }

        HackerrankApplication::$template = str_repeat("%d\n", count($matches));
        return $matches;
    }

    protected function add(string $name) : void
    {
        $this->rootTrie->add($name);
        //$this->addNameToIndex($name);
    }

    protected function find(string $partial) : int
    {
        $trie = $this->rootTrie->find($partial);
        if ($trie instanceof Trie) {
            return $trie->count;
        }
        return 0;

        //return $this->countMatches($partial);
    }

    protected function addNameToIndex(string $name) : void
    {
        $n = strlen($name);
        for ($i = 1; $i <= $n; $i++) {
            $partial = substr($name, 0, $i);
            if (!isset($this->indexStartBeginning[$partial])) {
                $this->indexStartBeginning[$partial] = 0;
            }
            $this->indexStartBeginning[$partial]++;
        }
    }

    protected function countMatches(string $partial) : int
    {
        return $this->indexStartBeginning[$partial] ?? 0;
    }
}
