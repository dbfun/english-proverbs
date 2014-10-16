#!/usr/bin/php
<?

require(__DIR__ . '/lib/simplehtmldom/simple_html_dom.php');

class documentParser {
  private $database;
  public function __construct(Mongo $mongo) {
    $this->database = $mongo->proverbs;
  }
  
  private $content;
  public function getContent($fileName) {
    $this->content = file_get_contents($fileName);
    $this->content = preg_replace('#<\/i><i>#Ui', '', $this->content);
  }
    
  private function saveMatch($matches) {
    $item = new stdClass();
    $item->source = trim($matches[1], ' .');
    $item->translation = trim($matches[2]);
    if (preg_match('#(.*)<i>.*<\/i>(.*)#i', $item->translation, $_matches)) {
      $item->translation = trim($_matches['1'], ' .');
      $item->russians = array_filter(explode('.', trim($_matches['2'])));
      foreach($item->russians as &$_item) {
        $_item = trim($_item);
        }
      unset($_item);
      }
    $this->database->english->insert($item);
  }
    
  public function parseNsave() {
    $html = str_get_html($this->content);
    $content = $html->find('div#content', 0)->innertext;
    preg_replace_callback('#<b>([^<]*)<\/b><br><br>(.*)<br><br>#Ui', 'self::saveMatch', $content);
  }
  
}


$mongo = new Mongo('localhost');
$documentParser = new documentParser($mongo);

for($i = 1; $i <=50; $i++) {
  $fileName = __DIR__ . '/src/pages/'.$i.'.html';
  $documentParser->getContent($fileName);
  $documentParser->parseNsave();
}

echo PHP_EOL;