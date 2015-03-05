<?php
require("server_connect.php");

class page{
    private $title;
    private $url;
    private $template = "default";
    private $content;
    private $home = false;

    public function get_title(){
        return $this->title;
    }

    public function render(){
        if(!empty($this->content)){
            if($this->home){
                echo $this->content;
            }
            else {
                echo $this->generate_content($this->content);
            }
        }
    }

    public function get_template($filename){
        return file_get_contents($filename);
    }

    function page(){
        if(!isset($_GET['ch'])){ $this->template = "home"; $this->home = true; }
        $this->content = $this->get_template($this->template . ".html");
    }

    public function get_page_id(){
        if(isset($_GET["pid"])){
            return $_GET["pid"];
        } else {
            return 0;
        }
    }

    public function get_page_content(){
        $pid = $this->get_page_id();
        $sql = "SELECT html_content FROM pages WHERE p_id=$pid";
    }

    public function generate_content($contents){
        return $contents;
    }
}
?>

