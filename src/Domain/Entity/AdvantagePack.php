<?php

namespace Mikron\json2tex\Domain\Entity;


use Mikron\json2tex\Domain\Exception\MalformedJsonException;

class AdvantagePack
{
    /**
     * @var string
     */
    private $json;

    /**
     * @var array
     */
    private $array;

    /**
     * @var string
     */
    private $document;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $index;

    /**
     * @var string
     */
    private $content;

    /**
     * Document constructor.
     * @param string $json
     * @param string $path
     */
    public function __construct($json, $path = "")
    {
        $this->json = $json;
        $this->array = json_decode($this->json, true);
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getJson(): string
    {
        return $this->json;
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    /**
     * @return string
     */
    public function getDocument(): string
    {
        return $this->document;
    }

    private function makeContentAndIndex()
    {
        $traitTexes = [];
        $traitIndex = [];

        if ($this->array === null) {
            throw new MalformedJsonException('Invalid trait structure. Cannot generate document.');
        }

        foreach ($this->array as $traitLabel => $trait) {
            $treeObject = new Advantage(json_encode($trait), $this->path);
            $traitTexes[$traitLabel] = $treeObject->getTex();
            $traitIndex[$traitLabel] = $treeObject->getIndex();
        }

        $this->content = implode(PHP_EOL . PHP_EOL . PHP_EOL, $traitTexes);
        $this->index = implode(PHP_EOL . PHP_EOL . PHP_EOL, $traitIndex);
    }

    /**
     * @return string
     * @throws MalformedJsonException
     */
    public function getIndex(): string
    {
        if (empty($this->index)) {
            $this->makeContentAndIndex();
        }

        return $this->index;
    }

    /**
     * @return string
     * @throws MalformedJsonException
     * @throws \Exception
     */
    public function getContent(): string
    {
        if (empty($this->content)) {
            $this->makeContentAndIndex();
        }

        return $this->content;
    }
}
