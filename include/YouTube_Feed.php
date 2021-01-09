<?php 
// Create YouTube App           :- https://console.cloud.google.com/apis/credentials
// YouTube Document is here     :- https://developers.google.com/youtube/v3/docs

class Youtube_Feed {
    public $AccessToken = "API_KEY";       // YouTube AccessToken(API Key)
    public $maxResults = 100;

    function Youtube_Userfeed(){
        $Usename = "";
        $YTAPI = "https://www.googleapis.com/youtube/v3/channels?part=snippet&forUsername={$Usename}&key={$this->AccessToken}";
        $YTData = json_decode(file_get_contents($YTAPI),true);

        return $YTData;
    }

    function Youtube_Channel(){
        $Channel = "";
        $Order = "date";                          // date - Title - rating - relevance - viewCount - videoCount
		$YTAPI = "https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&order={$Order}&maxResults={$this->maxResults}&channelId={$Channel}&key={$this->AccessToken}";
        $YTData = json_decode(file_get_contents($YTAPI),true);

        return $YTData;
    }

    function Youtube_Playlist(){
        $Playlist = "";
        $YTAPI = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId={$Playlist}&maxResults={$this->maxResults}&key={$this->AccessToken}";
        $YTData = json_decode(file_get_contents($YTAPI),true);

        return $YTData;
    }

    function Youtube_Search(){
        $Search = "";
        $YTAPI = "https://www.googleapis.com/youtube/v3/search?part=id,snippet&q={$Search}&type=video&maxResults={$this->maxResults}&key={$this->AccessToken}";
        $YTData = json_decode(file_get_contents($YTAPI),true);

        return $YTData;
    }

    function Youtube_statistics(){          // Get view - likes - comment - Dislike
        $VideoId = "";
        $YTAPI = "https://www.googleapis.com/youtube/v3/videos?part=statistics&id={$VideoId}&maxResults={$this->maxResults}&key={$this->AccessToken}";
        $YTData = json_decode(file_get_contents($YTAPI),true);

        return $YTData;
    }

}
$Youtube = new Youtube_Feed();
$Youtube->Youtube_Userfeed();
$Youtube->Youtube_Channel();
$Youtube->Youtube_Playlist();
$Youtube->Youtube_Search();
$Youtube->Youtube_statistics();