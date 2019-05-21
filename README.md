# webscraper-myanimelist

## Usage

### Anime

```php
<?php

require_once __DIR__ . '/src/MyAnimeList.php';

$myanimelist = new MyAnimeList();

// TRUE  Result will be returned as JSON string
// FALSE Result will be returned as array
$jsonMode = TRUE;

$id = 31964;
$anime = $myanimelist->getAnime($id, $jsonMode);

print_r($anime);

$keyword = 'boku%20no%20hero%20academia';
$limit = 5;
$animes = $myanimelist->searchAnime($keyword, $jsonMode, $limit);

print_r($animes);
```

### Manga

```php
<?php

require_once __DIR__ . '/src/MyAnimeList.php';

$myanimelist = new MyAnimeList();

// TRUE  Result will be returned as JSON string
// FALSE Result will be returned as array
$jsonMode = TRUE;

$id = 23390;
$manga = $myanimelist->getManga($id, $jsonMode);

print_r($manga);

$keyword = 'shingeki%20no%20kyojin';
$limit = 5;
$mangas = $myanimelist->searchManga($keyword, $jsonMode, $limit);

print_r($mangas);
```
