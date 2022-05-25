<?php

use App\Blog\Article;
use App\Blog\Attachment;
use App\Blog\Category;
use App\Blog\Tag;
use App\Blog\Search;

require __DIR__.'/vendor/autoload.php';

$categories = [
    new Category(1, 'foo', null),
    new Category(2, 'bar', null),
    new Category(3, 'baz', null),
];
dump($categories);

$tags = [
    new Tag(1, 'HTML', null),
    new Tag(2, 'CSS', null),
    new Tag(3, 'JS', null),
];
dump($tags);

$articles = [
    new Article(1, 'Lorem', 'Lorem lorem', $categories[0], [$tags[0], $tags[1]]),
    new Article(2, 'Ipsum', 'Ipsum ipsum', $categories[1], [$tags[0], $tags[2]]),
    new Article(3, 'Sit', 'Sit sit', $categories[1], [$tags[2]]),
];
dump($articles);

foreach($articles as $article) {
    echo "title: {$article->getTitle()}";
    echo '<br>';
    // echo "category: {$article->getCategory()->getName()}";
    // echo '<br>';
    
    // même chose que au dessus
    $category = $article->getCategory();
    echo "category: {$category->getName()}";
    echo '<br>';

    foreach ($article->getTags() as $tag) {
        echo "tag: {$tag->getName()}";
        echo '<br>';
    }

    foreach ($category->getArticles() as $article) {
        echo "same category title: {$article->getTitle()}";
    }
}

$attachments = [
    new Attachment(1, "doc1", "/doc/doc1.pdf", $categories[0]),
    new Attachment(2, "doc2", "/doc/doc2.pdf", $categories[1]),
    new Attachment(3, "doc3", "/doc/doc3.pdf", $categories[2]),
];

$i = 0;
$result = Search::hasCategory($articles[$i], $categories[$i]);
echo "{$articles[$i]->getCategory()->getName()} / {$categories[$i]->getName()}";
echo "<br>";
echo $result ? "oui" : "non";
echo "<br>";

$result = Search::hasCategory($attachments[$i], $categories[$i]);
echo "{$attachments[$i]->getCategory()->getName()} / {$categories[$i]->getName()}";
echo "<br>";
echo $result ? "oui" : "non";
echo "<br>";