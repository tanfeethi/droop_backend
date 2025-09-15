<?php

namespace Modules\TwitterIntefrationManagement\App\Services\Dashboard;

use App\Traits\ApiResponseTrait;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use GuzzleHttp\Exception\ClientException;

class TwitterService
{


    use ApiResponseTrait;
  
    /**limit exceeded */
    public function getLastTweets()
    {
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

            return $tweets;
        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();

            if ($statusCode === 429) {
                // Too Many Requests
                return response()->json([
                    'error' => ''
                ], 429);

                return $this->sendResponse([], 'fail' ,'Rate limit exceeded. Please try again later.', $statusCode);
            }

             return $this->sendResponse([], 'fail' ,  $e->getMessage(), $statusCode);

    
        } catch (\Exception $e) {

               return $this->sendResponse([], 'fail' ,  $e->getMessage(), 400);
           
        }
    }



  
}
