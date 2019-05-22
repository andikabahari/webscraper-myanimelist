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
   * @param int $id
   * @param bool $jsonMode
   * @return mixed
   */
  public function getAnime($id, $jsonMode=FALSE)
  {
    return $this->anime->get($id, $jsonMode);
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

  /**
   * @param int $id
   * @param bool $jsonMode
   * @return mixed
   */
  public function getManga($id, $jsonMode=FALSE)
  {
    return $this->manga->get($id, $jsonMode);
  }

  /**
   * @param string $keyword
   * @param bool $jsonMode
   * @param int $limit
   * @return mixed
   */
  public function searchManga($keyword, $jsonMode=FALSE, $limit=5)
  {
    return $this->manga->search($keyword, $jsonMode, $limit);
  }
}
