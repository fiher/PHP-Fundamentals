<?php
class Songs{
    public $name;
    public $artist;
    public $durationInSeconds;

    public function __construct($artist,$name,$durationString)
    {
        $this->name = $name;
        $this->artist=$artist;
        $this->durationInSeconds = (explode(":",$durationString)[0]*60)+explode(":",$durationString)[1];
    }
}
$n = trim(fgets(STDIN));
$songs = array();

    for ($i = 0; $i < $n; $i++) {
        try{
        $song = explode(";", trim(fgets(STDIN)));
        if (strlen($song[0]) >= 3 && strlen($song[0]) <= 20) {
            if (strlen($song[1]) >= 3 && strlen($song[1]) <= 30) {
                if (explode(":", $song[2])[0] >= 0 && explode(":", $song[2])[0] <= 14) {
                    if (explode(":", $song[2])[1] >= 0 && explode(":", $song[2])[1] <= 59) {
                        echo "Song added\n";
                        $songs[] = new Songs($song[0], $song[1], $song[2]);
                    } else {
                        throw new Exception("Song seconds should be between 0 and 59.");
                    }
                } else {
                    throw new Exception("Song minutes should be between 0 and 14.");
                }
            } else {
                throw new Exception("Song name should be between 3 and 30 symbols.");
            }
        } else {
            throw new Exception("Artist name should be between 3 and 20 symbols.");
        }
        }catch (Exception $e) {
            $exception = true;
            echo $e->getMessage(),"\n";
        }
    }
echo "Songs added: ".count($songs)."\n";
$duration = 0;
foreach ($songs as $song){
    $duration += $song->durationInSeconds;
}
//$hours = $duration%3600;
////$duration = floor($duration/3600);
//$minutes = $duration%60;
//$duration = $duration%60;
$date = explode(":",gmdate("H:i:s",$duration));
echo "Playlist length: ".(int)($date[0])."h ".$date[1]."m ".$date[2]."s";
