<?php

namespace Modules\TwitterIntefrationManagement\App\Http\Controllers\Api\Frontend;

use GuzzleHttp\Client;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;
use Modules\TwitterIntefrationManagement\App\Models\Twitter;
use Modules\TwitterIntefrationManagement\App\Services\Dashboard\TwitterService;

class TwitterController extends Controller
{   
    use ApiResponseTrait;
   public function getLatestTweets(TwitterService $twitterService){
       $bearerToken = 'AAAAAAAAAAAAAAAAAAAAAAtzuQEAAAAAtjfn4v6L33OsW6td0BR0w7JJIS4%3DVwBPHDhkFCcQ3vgsul0w1taDjQUdGCoAj845qXwxfzNBFmxiGe';
        $client = new Client([
            'base_uri' => 'https://api.twitter.com/2/',
            'headers' => [
                'Authorization' => 'Bearer ' . $bearerToken,
                'Accept'        => 'application/json',
            ],
        ]);
        $username = 'YafeaSA';
        try {
            // Step 1: Get user ID from username
            $userResponse = $client->get("users/by/username/{$username}");
            $user = json_decode($userResponse->getBody(), true);
            if (!isset($user['data']['id'])) {
                return response()->json(['error' => 'User not found'], 404);
            }
            $userId = $user['data']['id'];
            // Step 2: Get the latest tweets
            $tweetsResponse = $client->get("users/{$userId}/tweets", [
                'query' => [
                    'max_results' => 5, // Must be between 5 and 100
                    'tweet.fields' => 'created_at,text',
                ]
            ]);
            $tweets = json_decode($tweetsResponse->getBody(), true);
            // Keep only the first 3 tweets
            if (isset($tweets['data'])) {
                $tweets['data'] = array_slice($tweets['data'], 0, 3);
            }
             foreach($tweets['data'] as $tweet){
                Twitter::create([
                    'tweet_id' => $tweet['id'],
                ]);
            }
        } catch (\Exception $e) {
        }

        $tweetsFromDataBase = Twitter::latest()->get()->take(3);
        return $this->sendResponse($tweetsFromDataBase);
   }
}
