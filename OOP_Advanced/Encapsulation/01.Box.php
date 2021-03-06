<?php
class Box{
    protected $length;
    protected $width;
    protected $height;
    protected $surfaceArea;
    protected $volume;
    protected $lateralSurfaceArea;

    private function setHeight($height)
    {
        $this->height = $height;
    }
    private function setWidth($width)
    {
        $this->width = $width;
    }
    private function setLength($length)
    {
        $this->length = $length;
    }
    private function setSurfaceArea($length,$width,$height){
     $this->surfaceArea = (2*$length*$width)+(2*$length*$height)+(2*$width*$height);
    }
    private function setVolume($length,$width,$height){
      $this->volume = $length*$width*$height;
    }
    private function setLateralSurfaceArea($length,$width,$height){
     $this->lateralSurfaceArea = (2*$length*$height)+(2*$width*$height);
    }


    public function getSurfaceArea(){
       return sprintf('%0.2f',$this->surfaceArea);
    }
    public function getLateralSurfaceArea(){
      return sprintf('%0.2f',$this->lateralSurfaceArea);
    }
    public function getVolume(){
        return sprintf('%0.2f',$this->volume);

    }
    public function __construct($length,$width,$height)
    {
         $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setLateralSurfaceArea($length,$width,$height);
        $this->setSurfaceArea($length,$width,$height);
        $this->setVolume($length,$width,$height);
    }
}
$length = trim(fgets(STDIN));
$width = trim(fgets(STDIN));
$height = trim(fgets(STDIN));
$box = new Box($length,$width,$height);
echo "Surface Area - ".$box->getSurfaceArea()."\n";
echo "Lateral Surface Area - ".$box->getLateralSurfaceArea()."\n";
echo "Volume - ".$box->getVolume();
