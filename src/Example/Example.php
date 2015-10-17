<?php
namespace Dandart\Example;
require __DIR__ . '/../../vendor/autoload.php';

use Dandart\EvilObject;

$animal = new EvilObject();
$speakable = new EvilObject();
$speakable->defineProperties([
    'speak' => function()
    {
        return 'Hello!'.PHP_EOL;
    }
]);
$quackable = new EvilObject();
$quackable->defineProperties([
    'speak' => function()
    {
        return 'He-I mean, quack.'.PHP_EOL;
    }
]);

$duck = new EvilObject();
$duck->mixin($speakable);
$duck->mixin($quackable);

echo $duck->speak();