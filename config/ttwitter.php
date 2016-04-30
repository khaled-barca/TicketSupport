<?php

// You can find the keys here : https://apps.twitter.com/

return [
	'debug'               => false,

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        => function_exists('env') ? env('TWITTER_CONSUMER_KEY', 'PuklHQqZWkOrApNxn1xqtbk8W') : 'PuklHQqZWkOrApNxn1xqtbk8W',
	'CONSUMER_SECRET'     => function_exists('env') ? env('TWITTER_CONSUMER_SECRET', 'hwCJ4aJzgWEyjNiRwIPnffoTrfvRFkcq91Upqx8btzb7bd1Alz') : 'hwCJ4aJzgWEyjNiRwIPnffoTrfvRFkcq91Upqx8btzb7bd1Alz',
	'ACCESS_TOKEN'        => function_exists('env') ? env('TWITTER_ACCESS_TOKEN', '953685613-QTAxwvMyRlMMZ4uUuDHLsjoL0CaswarU4IMJ9SE7') : '953685613-QTAxwvMyRlMMZ4uUuDHLsjoL0CaswarU4IMJ9SE7',
	'ACCESS_TOKEN_SECRET' => function_exists('env') ? env('TWITTER_ACCESS_TOKEN_SECRET', 'zfsFdYftlWEFrj4yhqFQbjbPZ9oRIFx9OtIyDFftx1o0w') : 'zfsFdYftlWEFrj4yhqFQbjbPZ9oRIFx9OtIyDFftx1o0w',
];