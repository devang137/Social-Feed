<?php

define("Corrent_PATH", getcwd());

class SocialFeed {
  
    function Facebook_Feed(){
        include Corrent_PATH.'/include/Facebook_Feed.php';
    }
    function Twetter_Feed(){
        include Corrent_PATH.'/include/Twetter_Feed.php';
    }
    function Instagram_Feed(){
        include Corrent_PATH.'/include/Instagram_Feed.php';
    }
    function Vimeo_Feed(){
        include Corrent_PATH.'/include/Vimeo_Feed.php';
    }
    function YouTube_Feed(){
        include Corrent_PATH.'/include/YouTube_Feed.php';
    }

}
  
$SocialFeed = new SocialFeed();
$SocialFeed->Facebook_Feed();
$SocialFeed->Twetter_Feed();
$SocialFeed->Instagram_Feed();
$SocialFeed->YouTube_Feed();
$SocialFeed->Vimeo_Feed();


