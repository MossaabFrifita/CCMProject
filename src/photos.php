
<?php
function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

function scrape_insta_hash($tag) {
    if(get_http_response_code('https://www.instagram.com/explore/tags/'.$tag.'/') != "200"){
        echo "This tag is not available at the moment. Try again later or delete the album";
        return null;
    }else{

        $insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/');
        $shards = explode('window._sharedData = ', $insta_source);
        $insta_json = explode(';</script>', $shards[1]);

        $insta_array = json_decode($insta_json[0], TRUE);
        return $insta_array; // this return a lot things print it and see what else you need
    }
}
$tag = $_GET['tag'];
$results_array = scrape_insta_hash($tag);
$limit = $_GET['limit'];
$image_array= array(); // array to store images.
	for ($i=0; $i < $limit; $i++) {
        if (isset($results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'])) {
            $latest_array = $results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'];
            $image_data = '<img src="' . $latest_array['thumbnail_src'] . '" width="600" height="400">';
            array_push($image_array, $image_data);
        }
        else exit;
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

<div class="clearfix"></div>



</body>
</html>


