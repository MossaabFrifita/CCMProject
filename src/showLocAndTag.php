
<?php

function search(
        $latitude,
        $longitude,
        $query = null)
    {
        $locations = $this->ig->request('location_search/')
            ->addParam('rank_token', $this->ig->account_id.'_'.Signatures::generateUUID())
            ->addParam('latitude', $latitude)
            ->addParam('longitude', $longitude);
        if ($query === null) {
            $locations->addParam('timestamp', time());
        } else {
            $locations->addParam('search_query', $query);
        }
        return $locations->getResponse(new Response\LocationResponse());
    }

  function findPlaces(
        $query,
        array $excludeList = [],
        $rankToken = null)
    {
        // Do basic query validation. Do NOT use throwIfInvalidHashtag here.
        if (!is_string($query) || $query === null) {
            throw new \InvalidArgumentException('Query must be a non-empty string.');
        }
        $location = $this->_paginateWithExclusion(
            $this->ig->request('fbsearch/places/')
                ->addParam('timezone_offset', date('Z'))
                ->addParam('query', $query),
            $excludeList,
            $rankToken
        );
        try {
            /** @var Response\FBLocationResponse $result */
            $result = $location->getResponse(new Response\FBLocationResponse());
        } catch (RequestHeadersTooLargeException $e) {
            $result = new Response\FBLocationResponse([
                'has_more'   => false,
                'items'      => [],
                'rank_token' => $rankToken,
            ]);
        }
        return $result;
    }

  function findPlacesNearby(
        $latitude,
        $longitude,
        $query = null,
        $excludeList = [],
        $rankToken = null)
    {
        $location = $this->_paginateWithExclusion(
            $this->ig->request('fbsearch/places/')
                ->addParam('lat', $latitude)
                ->addParam('lng', $longitude)
                ->addParam('timezone_offset', date('Z')),
            $excludeList,
            $rankToken,
            50
        );
        if ($query !== null) {
            $location->addParam('query', $query);
        }
        try {
            /** @var Response\FBLocationResponse() $result */
            $result = $location->getResponse(new Response\FBLocationResponse());
        } catch (RequestHeadersTooLargeException $e) {
            $result = new Response\FBLocationResponse([
                'has_more'   => false,
                'items'      => [],
                'rank_token' => $rankToken,
            ]);
        }
        return $result;
    }


function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

function scrape_insta_hash($location) {
    if(get_http_response_code('https://www.instagram.com/explore/tags/'.$location.'/') != "200"){
        echo "This album is not available at the moment. Try again later or delete it";
        return null;
    }else{

        $insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$location.'/');
        $shards = explode('window._sharedData = ', $insta_source);
        $insta_json = explode(';</script>', $shards[1]);

        $insta_array = json_decode($insta_json[0], TRUE);
        return $insta_array; // this return a lot things print it and see what else you need
    }
}
$location = $_POST['Location'];
$results_array = scrape_insta_hash($location);
$limit = $_POST['nbPhotosLocTag'];
$image_array= array(); // array to store images.
	for ($i=0; $i < $limit; $i++) {
        if (isset($results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'])) {
            $latest_array = $results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'];
            $image_data = '<img src="' . $latest_array['thumbnail_src'] . '" width="600" height="400">';
            array_push($image_array, $image_data);
        }

    }
	
$TAGS = $_POST['TAGS'];
$results_array = scrape_insta_hash($TAGS);	
	
	$image_array2= array(); // array to store images.
	for ($i=0; $i < $limit; $i++) {
        if (isset($results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'])) {
            $latest_array = $results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'];
            $image_data = '<img src="' . $latest_array['thumbnail_src'] . '" width="600" height="400">';
            array_push($image_array2, $image_data);
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
    
	<style>
		div.gallery {
			border: 1px solid #ccc;
		}

		div.gallery:hover {
			border: 1px solid #777;
		}

		div.gallery img {
			width: 100%;
			height: auto;
		}

		div.desc {
			padding: 15px;
			text-align: center;
		}

		* {
			box-sizing: border-box;
		}

		.responsive {
			padding: 0 6px;
			float: left;
			width: 24.99999%;
		}

		@media only screen and (max-width: 700px) {
			.responsive {
				width: 49.99999%;
				margin: 6px 0;
			}
		}

		@media only screen and (max-width: 500px) {
			.responsive {
				width: 100%;
			}
		}

		.clearfix:after {
			content: "";
			display: table;
			clear: both;
		}
	</style>
</head>
<body>

<h2>Image Gallery For your album</h2>



<?php foreach ($image_array as $image) { ?>

<div class="responsive">
	<div class="gallery">
		<a target="_blank">
		<?php echo $image; ?>
		</a>
	</div>
</div>

<?php } ?>

<?php foreach ($image_array2 as $image) { ?>

<div class="responsive">
	<div class="gallery">
		<a target="_blank">
		<?php echo $image; ?>
		</a>
	</div>
</div>

<?php } ?>


<div class="clearfix"></div>



</body>
</html>


