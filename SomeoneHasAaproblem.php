<?php
$body = "head";
$tag = "</".$body.">";
if($tag != strip_tags($tag)){
    echo "works";
}