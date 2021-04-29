<?php


use App\Article;

class ArticleTest extends \PHPUnit\Framework\TestCase
{
    protected Article $article;

    public function setUp(): void
    {
        $this->article = new Article();
    }

    public function testTitleIsEmptyByDefault(): void
    {
        self::assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle(): void
    {

        self::assertSame($this->article->getSlug(), "");
    }

    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = 'i will make it';
        self::assertSame($this->article->getSlug(), 'i_will_make_it');
    }

    public function testSlugHasSpacesReplacedByASingleUnderscore()
    {
        $this->article->title = "i  will  make \n it";
        self::assertSame($this->article->getSlug(), 'i_will_make_it');
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->title = " i  will  make it ";
        self::assertSame($this->article->getSlug(), 'i_will_make_it');
    }

}