<?php

namespace Visitor;

require_once __DIR__ . "/Entry.php";
require_once __DIR__ . "/Visitor.php";
require_once __DIR__ . "/DirectoryEntry.php";

/**
 * ファイルを表すクラス
 *
 * @access public
 * @extends \Visitor\Entry
 * @author ku2ma2 <motorohi.tsumaniku@gmail.com>
 * @copyright ku2ma2
 */
class Directory extends \Visitor\Entry
{
    private $name;
    private $dir;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->dir = new \Visitor\DirectoryEntry();
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSize()
    {
        $size = 0;
        $this->dir->rewind();

        while ($this->dir->hasNext()) {
            $entry = $this->dir->next();
            $size += $entry->getSize(); // 再帰的にサイズを計算する
        }
        return $size;
    }
    /**
     * ディレクトリ追加
     *
     * @access public
     * @param Entry $entry 追加するディレクトリ
     * @return Dir 自分自身
     */
    public function add(\Visitor\Entry $entry)
    {
        $this->dir->add($entry);
        return $this;
    }
    public function accept(\Visitor\Visitor $v)
    {
        $v->visit($this);
    }
}