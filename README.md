# webscraper-myanimelist

## Usage

```php
<?php

require_once __DIR__ . '/src/MyAnimeList.php';

// Keyword used for searching contents
$keyword = 'code geass';

// True? Result will be returned as JSON string
// False? Result will be returned as array
$jsonMode = FALSE;

// Number of contents
$limit = 5;

$myanimelist = new MyAnimeList();
$animes = $myanimelist->searchAnime($keyword, $jsonMode, $limit);

print_r($animes);
```
