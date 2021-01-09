<?php
// Facebook Document is here    :- https://developers.facebook.com/docs/
// Create Facebook app          :- https://developers.facebook.com/apps/
// Test Facebook URL            :- https://developers.facebook.com/tools/explorer/ 
// Create Facebook accesstoken  :- https://developers.facebook.com/tools/accesstoken

class Facebook_Feed {
    public $AccessToken = "API_KEY";       // Facebook AccessToken(API Key)
    public $FbLimit = 100;

    //Facebook account Data
    function Facebook_account_API(){
        $FbAPI = "https://graph.facebook.com/v8.0/me?fields=id,name,first_name,last_name,link,email,birthday,picture,posts.limit({$this->FbLimit}){type,message,story,caption,description,shares,picture,full_picture,source,created_time,reactions.summary(true),comments.summary(true).filter(toplevel)},albums.limit({$this->FbLimit}){id,type,link,picture,created_time,name,count,photos.limit({$this->FbLimit}){id,link,created_time,likes,images,name,comments.summary(true).filter(toplevel)}}&access_token={$this->AccessToken}";
        $FbData = json_decode(file_get_contents($FbAPI),true);

        return $FbData;
    }

    //Facebook Page Data 
    function Facebook_Page_API(){
        $FbPageid = "";     // Facebook Page Id
        $FbAPI = "https://graph.facebook.com/v8.0/{$FbPageid}?fields=id,name,username,link,fan_count,new_like_count,phone,emails,about,birthday,category,picture,posts.limit({$this->FbLimit}){id,full_picture,created_time,message,attachments{media,media_type,title,url},picture,story,status_type,shares,reactions.summary(true),likes.summary(true),comments.summary(true).filter(toplevel)},albums.limit({$this->FbLimit}){id,type,link,picture,created_time,name,count,photos.limit({$this->FbLimit}){id,link,created_time,images,name}}&access_token={$this->AccessToken}";
        $FbData = json_decode(file_get_contents($FbAPI),true);

        return $FbData;
    }
}

$Facebook = new Facebook_Feed();
$Facebook->Facebook_account_API();
$Facebook->Facebook_Page_API();
