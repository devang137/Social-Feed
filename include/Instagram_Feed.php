<?php 

// Instagram Document is here    :- https://developers.facebook.com/docs/instagram-basic-display-api/

class Instagram_Feed {
    
    function Instagram_API(){
        $AccessToken = "API_KEY";      // Instagram AccessToken(API Key)
        $Displaypost = 100;

        $IGAPI = "https://graph.instagram.com/me/?fields=account_type,id,media_count,username,media.limit($Displaypost){id,caption,permalink,thumbnail_url,timestamp,username,media_type,media_url}&access_token={$AccessToken}";
        $IGData = json_decode(file_get_contents($IGAPI),true);

        return $IGData;
    }
}
$Instagram = new Instagram_Feed();
$Instagram->Instagram_API();