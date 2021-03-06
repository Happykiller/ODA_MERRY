<?php
/**
 * Created by PhpStorm.
 * User: Happykiller
 * Date: 15/11/2015
 * Time: 19:10
 */

namespace App;

use VKBansal\FrontMatter\Parser;
use \cebe\markdown\GithubMarkdown;


class Page
{
    public $url;
    public $path;
    public $content;
    public $keys;
    public $type = 'html';
    public $lang = 'fr';

    public function __construct($url)
    {
        $this->url = $url;
        $path = str_replace(content_path, '', $url);
        $tab_options = explode ('.',$path);
        $this->type = $tab_options[sizeof($tab_options)-1];
        $this->lang = $tab_options[sizeof($tab_options)-2];
        $path = str_replace('index', '', $tab_options[0]);
        $this->path = str_replace('\\', '/', $path);
        $this->keys = $this->getKeys();
        $this->content = $this->getContent();
    }

    public function render(){
        $page = $this;
        $template = layout_path . DIRECTORY_SEPARATOR . $this->keys['template'] .'.php';
        ob_start();
        require $template;
        return ob_get_clean();
    }

    public function getContent(){
        $doc = Parser::parse(file_get_contents($this->url));
        $parser = new GithubMarkdown();
        $parser->enableNewLines = true;
        return $parser->parse($doc->getContent());
    }

    public function getKeys(){
        $doc = Parser::parse(file_get_contents($this->url));
        return $doc->getConfig();
    }

    public function getKey($key){
        return $this->keys[$key];
    }
}