<?php
class Books{
    public $title;
    public $author;
    public $price;
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        if(strlen($title)<3){
            throw new Exception("Title not valid!");
        }else {
            $this->title = $title;
        }
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        if($price<=0){
            throw new Exception("Price not valid!");
        }else {
            $this->price = $price;
            return $this;
        }
    }

    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        if(is_numeric(explode(" ",$author)[1][0])){
            throw new  Exception("Author not valid!");
        }
        $this->author = $author;
        return $this;
    }
    function __construct($title,$author,$price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }
    function __toString()
    {
        return ''.$this->getPrice();
    }
}
class Golden extends Books{
    public function getPrice() {
        return parent::getPrice() * 1.3;
    }
}
$author = trim(fgets(STDIN));
$title = trim(fgets(STDIN));
$price = trim(fgets(STDIN));
$type = trim(fgets(STDIN));
$book = null;
$exception = false;
if($type == "GOLD"){
try{
    $book = new Golden($title,$author,$price);
}catch (Exception $e) {
    $exception = true;
    echo $e->getMessage();
}
}elseif($type == "STANDARD"){
    try {
        $book = new Books($title, $author, $price);
    }catch (Exception $e) {
        $exception = true;
        echo $e->getMessage();
    }
}else{
    $exception = true;
    echo "Type is not valid!";
}
if(!$exception){
    echo "OK\n".$book;
}