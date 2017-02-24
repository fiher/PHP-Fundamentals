<?php
class Gandalf{
    private $foods = array('cram'=>2,'lembas'=>3,'apple'=>1,'melon'=>1,'honeycake'=>5,'mushrooms'=>-10);
    private $mood= 0;

    public function getMood()
    {
        $result = "";
       if($this->mood <-5){
           $result .= $this->mood."\nAngry";
       }elseif($this->mood<0){
           $result .= $this->mood."\nSad";
       }elseif($this->mood<15){
           $result .= $this->mood."\nHappy";
       }else{
           $result .= $this->mood."\nPHP";
       }
        return $result;
    }
    public function setMood($food)
    {
        if(key_exists(strtolower($food),$this->foods)) {
            $this->mood += $this->foods[strtolower($food)];
        }else{
            $this->mood += -1;
        }
    }
}
$gandalf = new Gandalf();
$foods = explode(",",trim(fgets(STDIN)));
foreach ($foods as $food){
    $gandalf->setMood(strtolower($food));
}
echo $gandalf->getMood();