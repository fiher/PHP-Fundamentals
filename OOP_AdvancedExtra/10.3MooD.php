<?php
class Archangel{
    public $username;
    public $hashPassword;
    public $level;
    public $specialPoints;
    public function __construct($username,$level,$specialPoints)
    {
        $this->username = $username;
        $this->level = $level;
        $this->hashPassword = strrev($username).strlen($username)*21;
        $this->specialPoints = $specialPoints;
    }
    public function __toString()
    {
        return ''.$this->username.'" | "'.$this->hashPassword.'" -> Archangel'."\n".intval($this->specialPoints*$this->level);
    }
}
class Demon{
    public $username;
    public $hashPassword;
    public $level;
    public $specialPoints;
    public function __construct($username,$level,$specialPoints)
    {
        $this->username = $username;
        $this->level = $level;
        $this->hashPassword = strlen($username)*217;
        $this->specialPoints = $specialPoints;
    }
    public function __toString()
    {
        return '"'.$this->username.'" | "'.$this->hashPassword.'" -> Demon'."\n".sprintf("%0.1f",round($this->specialPoints*$this->level,1));
    }
}
$player = explode(" | ",trim(fgets(STDIN)));
if($player[1]=="Demon"){
    $player = new Demon($player[0],$player[2],$player[3]);
}else{
    $player = new Archangel($player[0],$player[2],$player[3]);
}
echo $player;

