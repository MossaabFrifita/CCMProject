
<?php


function scrape_insta_hash($tag) {
	$insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/'); // instagrame tag url
	$shards = explode('window._sharedData = ', $insta_source);
	$insta_json = explode(';</script>', $shards[1]); 
	$insta_array = json_decode($insta_json[0], TRUE);
	return $insta_array; // this return a lot things print it and see what else you need
}
$tag = $_GET['tag']; // tag for which ou want images
$results_array = scrape_insta_hash($tag);
$limit = 15;
$image_array= array(); // array to store images.
	for ($i=0; $i < $limit; $i++) { 
		//previous code to get images from json 	
		//$latest_array = $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i];	
		//new code to get images from json 	
		$latest_array = $results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'];
	 	$image_data  = '<img src="'.$latest_array['thumbnail_src'].'" width="600" height="400">'; // thumbnail and same sizes
	 	//$image_data  = '<img src="'.$latest_array['display_src'].'">'; actual image and different sizes 
		array_push($image_array, $image_data);
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


