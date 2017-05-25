<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__) . '/BookShelf.php';

/**
 *
 */
final class BookShelfTest extends TestCase
{
    public function testGetBookAt()
    {
        $bookShelf = new BookShelf(3);
        $bookShelf->appendBook(new Book("book1"));
        $bookShelf->appendBook(new Book("book2"));
        $bookShelf->appendBook(new Book("book3"));

        $result = $bookShelf->getBookAt(1);

        $this->assertEquals($result->getName(), "book2");

        // TODO: 他のメソッドも追加する
        $this->markTestIncomplete(
          'このテストは、まだ実装されていません。'
        );
    }
}