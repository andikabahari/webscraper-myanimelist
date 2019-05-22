<?php

/**
 * Anime Class
 *
 * @author Andika Bahari
 * @license MIT License
 */
class Anime
{

  /**
   * @var string
   */
  private $searchURL = 'https://myanimelist.net/anime.php?q=';

  /**
   * @var string
   */
  private $ajaxURL = 'https://myanimelist.net/includes/ajax.inc.php?t=64&id=';

  /**
   * @param int $id
   * @param bool $jsonMode
   * @return mixed
   */
  public function get($id, $jsonMode)
  {
    $detail = $this->getAnimeDetail($this->ajaxURL . $id);

    return $jsonMode === TRUE
      ? json_encode($detail, JSON_PRETTY_PRINT)
      : $detail;
  }

  /**
   * @param string $keyword
   * @param bool $jsonMode
   * @param int $limit
   * @return mixed
   */
  public function search($keyword, $jsonMode, $limit)
  {
    $ids = $this->getAnimeIds($this->searchURL . $keyword);
    $details = array();

    // Max execution time is 3600 seconds
    ini_set('max_execution_time', 3600);

    $index = 0;
    for ($index; $index < $limit; $index++)
    {
      $details[] = $this->getAnimeDetail($this->ajaxURL . $ids[$index]);
    }

    return $jsonMode === TRUE
      ? json_encode($details, JSON_PRETTY_PRINT)
      : $details;
  }

  /**
   * @param string $url
   * @return array
   */
  private function getAnimeDetail($url)
  {
    $content = $this->curl($url);

    $regex = array(
      'title'       => '/hovertitle\"\>(.*?)\<\/a\>/',
      'description' => '/10px\;\"\>(.*?)\<a/',
      'type'        => '/Type\:\<\/span\>(.*?)\<br \/\>/',
      'score'       => '/Score\:\<\/span\>(.*?)\<small\>/',
      'status'      => '/Status\:\<\/span\>(.*?)\<br \/\>/',
      'genres'      => '/Genres\:\<\/span\>(.*?)\<br \/\>/',
      'link'        => '/\<a href\=\"(.*?)\"\>read/'
    );

    $detail = array();

    foreach ($regex as $key => $value)
    {
      $detail[$key] = preg_match($value, $content, $matches)
        ? trim($matches[1], ' ')
        : NULL;
    }

    return $detail;
  }

  /**
   * @param string $url
   * @return array
   */
  private function getAnimeIds($url)
  {
    $regex = '/rel\=\"a(.*?)\"/';
    $content = $this->curl($url);

    return preg_match_all($regex, $content, $matches)
      ? $matches[1]
      : NULL;
  }

  /**
   * @param string $url
   * @return string
   */
  private function curl($url)
  {
    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0';

    $options = array(
      CURLOPT_RETURNTRANSFER => TRUE,
      CURLOPT_HEADER         => FALSE,
      CURLOPT_USERAGENT      => $userAgent,
      CURLOPT_SSL_VERIFYPEER => FALSE,
      CURLOPT_SSL_VERIFYHOST => FALSE
    );

    $ch = curl_init($url);

    curl_setopt_array($ch, $options);

    $content = curl_exec($ch);
    $errno   = curl_errno($ch);
    $errmsg  = curl_error($ch);

    curl_close($ch);

    empty($errno) OR exit($errmsg);

    return $content;
  }
}
