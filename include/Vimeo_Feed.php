<?php 

// Vimeo Document is here   :- https://developer.vimeo.com/api/reference
// Create Vimeo app       :- https://developer.vimeo.com/apps

class Vimeo_Feed {

    public $AccessToken = "API_KEY";     // Vimeo AccessToken(API Key)
    public $PostLimit = 100;             // Only number

    function Vimeo_User(){
        $Username = "";
        $VmAPI = "https://api.vimeo.com/users/{$Username}/videos?access_token={$this->AccessToken}&per_page={$this->PostLimit}&page=1";
        $VmData = json_decode(file_get_contents($VmAPI),true);

        return $VmData;
    }

    function Vimeo_search(){
        $search = "";
        $VmAPI = "https://api.vimeo.com/videos?access_token={$this->AccessToken}&query={$search}&per_page={$this->PostLimit}&page=1";
        $VmData = json_decode(file_get_contents($VmAPI),true);

        return $VmData;
    }

    function Vimeo_liked(){
        $Username = "";
        $VmAPI = "https://api.vimeo.com/users/{$Username}/likes?access_token={$this->AccessToken}&per_page={$this->PostLimit}&page=1";
        $VmData = json_decode(file_get_contents($VmAPI),true);

        return $VmData;
    }

    function Vimeo_Channel(){
        $Channel = "";
        $VmAPI = "https://api.vimeo.com/channels/{$Channel}/videos?access_token={$this->AccessToken}&per_page={$this->PostLimit}&page=1";
        $VmData = json_decode(file_get_contents($VmAPI),true);

        return $VmData;
    }

    function Vimeo_Group(){
        $GroupName = "";
        $VmAPI = "https://api.vimeo.com/groups/{$GroupName}/videos?access_token={$this->AccessToken}&per_page={$this->PostLimit}&page=1";
        $VmData = json_decode(file_get_contents($VmAPI),true);

        return $VmData;
    }
    
    function Vimeo_Album(){
        $UserName = "";
        $AlbumName = "";
        
        $AlbumPassword = "&password='XYZ'";
		$VmAPI = "https://api.vimeo.com/users/{$UserName}/albums/{$AlbumName}/videos?access_token={$this->AccessToken}&per_page={$this->PostLimit}&page=1$AlbumPassword";
        $VmData = json_decode(file_get_contents($VmAPI),true);

        return $VmData;
    }

    function Vimeo_categories(){
        $CategorieName = "";
        $VmAPI = "https://api.vimeo.com/categories/{$CategorieName}/videos?access_token={$this->AccessToken}&per_page={$this->PostLimit}&page=1";
        $VmData = json_decode(file_get_contents($VmAPI),true);

        return $VmData;
    }

}
$Vimeo = new Vimeo_Feed();
$Vimeo->Vimeo_User();
$Vimeo->Vimeo_search();
$Vimeo->Vimeo_liked();
$Vimeo->Vimeo_Channel();
$Vimeo->Vimeo_Group();
$Vimeo->Vimeo_Album();
$Vimeo->Vimeo_categories();