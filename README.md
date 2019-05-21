# webscraper-myanimelist

## Usage

### Anime

```php
<?php

require_once __DIR__ . '/src/MyAnimeList.php';

// True? Result will be returned as JSON string
// False? Result will be returned as array
$jsonMode = FALSE;

$myanimelist = new MyAnimeList();

$id = 31964;
$anime = $myanimelist->getAnime($id, $jsonMode);

print_r($anime);

$keyword = 'boku no hero academia';
$limit = 5;
$animes = $myanimelist->searchAnime($keyword, $jsonMode, $limit);

print_r($animes);
```

### Manga

```php
<?php

require_once __DIR__ . '/src/MyAnimeList.php';

// True? Result will be returned as JSON string
// False? Result will be returned as array
$jsonMode = FALSE;

$myanimelist = new MyAnimeList();

$id = 23390;
$manga = $myanimelist->getManga($id, $jsonMode);

print_r($manga);

$keyword = 'shingeki no kyojin';
$limit = 5;
$mangas = $myanimelist->searchManga($keyword, $jsonMode, $limit);

print_r($mangas);
```
