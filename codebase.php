<?php
class page{
    private $title;
    private $url;
    private $template = "default";
    private $content;
    private $home = false;
    private $nav = '';
    private $mysqli;

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

    function __construct(){
        $this->mysqli = new mysqli("localhost", "root", 'nvTM$ql3', "php_exercises");
        $this->get_navs();
        if(!isset($_GET['ch']) || !isset($_GET['ex'])){
            $this->template = "home"; $this->home = true;
            $this->content = $this->get_template($this->template . ".html");
            $this->content = str_replace('__nav_links__', $this->nav, $this->content);
        } else {
            $this->content = $this->get_template($this->template . ".html");
        }
        
        
    }

    public function get_page_id(){
        if(isset($_GET["pid"])){
            return $_GET["pid"];
        } else {
            return 0;
        }
    }

    public function getcodes(){
        $ch = $_GET["ch"];
        $ex = $_GET["ex"];
        $code = file_get_contents("examples/$ch-$ex.php");
        $link = "examples/$ch-$ex.php";
        $title = "Chapter $ch, Example $ex";
        return array($link, $code, $title);
    }

    public function get_page_content(){
        $pid = $this->get_page_id();
        $sql = "SELECT html_content FROM pages WHERE p_id=$pid";
    }

    public function generate_content($contents){
        list($ilink, $gcode, $atitle) = $this->getcodes();
        $replaced = $contents;
        $replaced = str_replace('__web_title__', $atitle . " | Jilson Asis", $replaced);
        $replaced = str_replace('__nav_links__', $this->nav, $replaced);
        $replaced = str_replace('__ilink__', $ilink, $replaced);
        $replaced = str_replace('__codes__', htmlspecialchars($gcode), $replaced);
        $replaced = str_replace('__atitle__', $atitle, $replaced);
        return $replaced;
    }
    public function get_navs(){
        $this->nav = '';
        $navtmp = '<li class="dropdown"><a href="_navlink_" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">_navt_<span class="caret"></span></a><ul class="dropdown-menu" role="menu">';
        $droptmp = '<li><a href="_navlink2_">Example - _extmp_</a></li>';
        $sql = "SELECT chapter,example_number FROM examples ORDER BY chapter, example_number";
        $result = $this->mysqli->query($sql);
        $chold = 0;
        while ($row = $result->fetch_assoc()) {
            if($chold != $row['chapter']){
                if($chold != 0) { $this->nav .= "</ul></li>"; }
                $chold = $row['chapter'];

                $this->nav .= str_replace('_navlink_', 'index.php?ch=' . $row['chapter'], $navtmp);
                $this->nav = str_replace('_navt_', 'Ch' . $row['chapter'], $this->nav);
                $this->nav .= str_replace('_navlink2_', 'index.php?ch=' . $row['chapter'] . '&ex=' . $row['example_number'] , $droptmp);
                $this->nav = str_replace('_extmp_', $row['example_number'] , $this->nav);
            } else {
                $this->nav .= str_replace('_navlink2_', 'index.php?ch=' . $row['chapter'] . '&ex=' . $row['example_number'] , $droptmp);
                $this->nav = str_replace('_extmp_', $row['example_number'] , $this->nav);
            }
        }
    }
}
?>