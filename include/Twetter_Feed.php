<?php

// Create Twitter app           :- https://developer.twitter.com/en/application
// Twitter Document is here     :- https://developer.twitter.com/en/docs
// create List & Collection     :- https://tweetdeck.twitter.com/

require_once(Corrent_PATH.'/include/TwitterResource/TwitterAPIExchange.php');

class Twetter_Feed {
    public $API_KEY = "";                   // CONSUMER KEY (API KEY)
    public $API_SECRET = "";                // CONSUMER SECRET  (API SECRET)
    public $ACCESS_TOKEN = "";              // ACCESS TOKEN
    public $ACCESS_TOKEN_SECRET = "";       // ACCESS TOKEN SECRET

    public $requestMethod = 'GET';
    public $PostLimit = 100;
    public $include_Retweet = true;          // True(show Retweet) Or false
    public $include_Entities = true;         // True(show Images) Or false 
    public $settings = array();

    public function __construct() {
        $this->settings = array(
                    'consumer_key' => $this->API_KEY,
                    'consumer_secret' => $this->API_SECRET,
                    'oauth_access_token' => $this->ACCESS_TOKEN,
                    'oauth_access_token_secret' => $this->ACCESS_TOKEN_SECRET
                );
    }
    
    function Twetter_Userfeed(){        //Twetter account data
        $UserName = 'sagarpatel124';
        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
        $getfield = "?screen_name={$UserName}&count={$this->PostLimit}&include_entities={$this->include_Entities}&include_rts={$this->include_Retweet}&exclude_replies=true&tweet_mode=extended";
        
        $Tw_Data = $this->Twetter_API_Call($url,$getfield);
        return $Tw_Data;
    }

    function Userlike_tweet(){          //Get User like all twitt
        $UserName = 'sagarpatel124';
        $url = "https://api.twitter.com/1.1/favorites/list.json";
        $getfield = "?screen_name={$UserName}&count={$this->PostLimit}&include_entities={$this->include_Entities}&tweet_mode=extended";
        
        $Tw_Data = $this->Twetter_API_Call($url,$getfield);
        return $Tw_Data;
    }

    function Search_tweet(){            //Get User by Search
        $Search = "devang";
        $ResultType = "recent";         //mixed - recent - popular

        $url = "https://api.twitter.com/1.1/lists/statuses.json";
        $getfield = "?q={$Search}&result_type={$ResultType}&count={$this->PostLimit}&include_entities={$this->include_Entities}&tweet_mode=extended";
        
        $Tw_Data = $this->Twetter_API_Call($url,$getfield);
        return $Tw_Data;
    }

    function Twetter_list(){            //Get lists Twetter
        $listsid = "1335887026525114369"; 
        $url = "https://api.twitter.com/1.1/lists/statuses.json";
        $getfield = "?list_id={$listsid}&count={$this->PostLimit}&include_rts={$this->include_Retweet}&include_entities={$this->include_Entities}&tweet_mode=extended";

        $Tw_Data = $this->Twetter_API_Call($url,$getfield);
        return $Tw_Data;
    }

    function Twetter_Collection(){      //Get Collection Twetter
        $collectionsid = '539487832448843776';
        $url = "https://api.twitter.com/1.1/collections/entries.json";
        $getfield = "?id=custom-{$collectionsid}&count={$this->PostLimit}&tweet_mode=extended";

        $Tw_Data = $this->Twetter_API_Call($url,$getfield);
        return $Tw_Data;
    }

    function Twetter_Trends(){          //Get User by Search
        $WOEID = "23424848";
        $url = "https://api.twitter.com/1.1/trends/place.json";
        $getfield = "?id={$WOEID}";
        
        $Tw_Data = $this->Twetter_API_Call($url,$getfield);
        return $Tw_Data;
    }

    function Home_timeline(){            //Get Home_timeline
        $UserName = 'sagarpatel124';
        $url = "https://api.twitter.com/1.1/statuses/home_timeline.json";
	    $getfield = "?screen_name={$UserName}&count={$this->PostLimit}&exclude_replies=true&include_entities={$this->include_Entities}&tweet_mode=extended";

        $Tw_Data = $this->Twetter_API_Call($url,$getfield);
        return $Tw_Data;
    }

    function Mention_Timeline(){         //Get Home_timeline
        $url = "https://api.twitter.com/1.1/statuses/mentions_timeline.json";
		$getfield = "?count={$this->PostLimit}&include_entities={$this->include_Entities}&tweet_mode=extended";
        $Tw_Data = $this->Twetter_API_Call($url,$getfield);

        return $Tw_Data;
    }

    function Twetter_API_Call($url,$getfield){          // Twitter API call function
        $twitter = new TwitterAPIExchange($this->settings);
        $TwResponse = $twitter->setGetfield($getfield)->buildOauth( $url, $this->requestMethod )->performRequest();
        $TwResponce = json_decode($TwResponse,true);

        return $TwResponce;
    }
}

$Twetter = new Twetter_Feed();
$Twetter -> Twetter_Userfeed();
$Twetter -> Userlike_tweet();
$Twetter -> Search_tweet();
$Twetter -> Twetter_list();
$Twetter -> Twetter_Collection();
$Twetter -> Twetter_Trends();
$Twetter -> Home_timeline();
$Twetter -> Mention_Timeline();