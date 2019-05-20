<?php

require_once __DIR__ . '/Anime/Anime.php';
require_once __DIR__ . '/Manga/Manga.php';

/**
 * MyAnimeList Class
 *
 * @author Andika Bahari
 * @license MIT License
 */
class MyAnimeList
{

  /**
   * @var object
   */
  private $anime;

  /**
   * @var object
   */
  private $manga;

  public function __construct()
  {
    $this->anime = new Anime();
    $this->manga = new Manga();
  }

  /**
   * @param string $keyword
   * @param bool $jsonMode
   * @param int $limit
   * @return mixed
   */
  public function searchAnime($keyword, $jsonMode=FALSE, $limit=5)
  {
    return $this->anime->search($keyword, $jsonMode, $limit);
  }
}
