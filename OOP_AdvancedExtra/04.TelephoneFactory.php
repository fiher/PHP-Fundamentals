<?php
interface Calling{
    public function calling($array);
}
interface browseInternetExplorer{
    public function browse($array);
}
class Smartphone implements Calling,browseInternetExplorer{
    private $telephoneNumbers;
    public function getTelephoneNumbers()
    {
        return $this->telephoneNumbers;
    }
    public function setTelephoneNumbers($telephoneNumbers)
    {
        $this->telephoneNumbers = $telephoneNumbers;
    }
    private $sites;
    public function getSites(){
        return $this->sites;
    }
    public function setSites($array){
        $this->sites = $array;
    }
    public function calling($array){
        $result="";
        foreach ($array as $number){
            if (ctype_digit($number)) {
                $result .= "Calling... " . $number . "\n";
            }else{
                $result .= "Invalid number!\n";
            }
        }
        return $result;
    }
    public function browse($array)
    {
      $result='';
        foreach ($array as $site){
            if(1 === preg_match('~[0-9]~', $site)){
                $result .= "Invalid URL!\n";
            }else {
                $result .= "Browsing: " . $site . "!\n";
            }
        }
        return $result;
    }
    public function __construct($numbers,$sites)
    {
        $this->setSites($sites);
        $this->setTelephoneNumbers($numbers);
    }
    public function __toString()
    {
        return $this->calling($this->getTelephoneNumbers()).$this->browse($this->getSites());
    }
}
$numbers = explode(" ",trim(fgets(STDIN)));
$sites = explode(" ",trim(fgets(STDIN)));
$apple = new Smartphone($numbers,$sites);
echo $apple;