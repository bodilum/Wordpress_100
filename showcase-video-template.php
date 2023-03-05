<?php

// Template Name: Showcase Video Layout


$post_id =  $_GET['video_id'];

/// function to generate video html
function genVideoHtml($vid_url) {
    $vid_html = '';
    $vid_type = 'none';    

    $utube_regx = "/^(?:https?:)?(?:\/\/)?(?:youtu\.be\/|(?:www\.|m\.)?youtube\.com\/(?:watch|v|embed)(?:\.php)?(?:\?.*v=|\/))([a-zA-Z0-9\_-]{7,15})(?:[\?&][a-zA-Z0-9\_-]+=[a-zA-Z0-9\_-]+)*(?:[&\/\#].*)?$/";
    $vimeo_regx = "/(?:http|https)?:?\/?\/?(?:www\.)?(?:player\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|video\/|)(\d+)(?:|\/\?)/";
    $mp4_vid_regx = "/https?.*?\.mp4/";

    $vid_url = trim($vid_url);

    // check for null or empty string
    if($vid_url == null || $vid_url == '') {
        // no valid video url
        $vid_html = "<div class='infoBox infoBox1'>
        <h2>There seems to be a problem showing this video.</h2>
        <a href=''>Kindly refresh the browser</a>
        <a href='". home_url() ."' title='Home'>Home</a>
		<a href='". home_url() . "/work' title='Our Works'>See more of our works</a>
        </div>
        ";
        return $vid_html;
    }

    // test vimeo video
    if( preg_match( $vimeo_regx, $vid_url, $matches) )  {
        // echo 'vimeo: ' . $matches;
        $vid_type = 'vimeo';
    }

    // test youtube if false
    if( preg_match( $utube_regx, $vid_url, $matches) ) {
        // echo 'utube: ' . $matches;
        $vid_type = 'utube';
    }

    // test mp4 if false
    if( preg_match( $mp4_vid_regx, $vid_url, $matches) ) {
        // echo 'mp4: ' . $matches;
        $vid_type = 'mp4';
    }


    /// video html
    switch ($vid_type) {
        default:
        case 'mp4':
                $vid_html = '<div class="_vidItm" vidType="mp4">
                    <video autoplay playsinline muted loop preload controls><source src="'. $vid_url . '" /></video>
                </div>';
            break;
            case 'utube':
                $vid_html = '<div class="_vidItm" vidType="mp4">
                    <iframe src="'. $vid_url . '"></iframe> 
                </div>';
            break;
        case 'vimeo':
                $vid_html = '<div class="_vidItm" vidType="mp4">
                    <iframe src="'. $vid_url . '" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
                </div>';
            break;
    }


    // $vid_html = "<h2>Empty...Empty...Empty...Empty...Empty...Empty..." . $vid_url . "</h2>";
    // $vid_html = "<h2>Empty...Empty...Empty...Empty...Empty...Empty..." . $vid_type . "</h2>";
    return $vid_html;
}

?>

<div class="showcaseVideoContent">

<?php if(!$post_id) { ?>
	
	<div class="infoBox">
		<h2>
			The video id is invalid. 		
		</h2>
		<a href="<?php echo home_url(); ?>" title="Home">Home</a>
		<a href="<?php echo home_url() . "/work"; ?>" title="Our Works">See Our Works</a>
	</div>
	
	
<?php } else {
	// get post
	$post = get_post($post_id);

    // get title
    $post_title = get_field('title', $post_id);

    // get client
    $post_client = get_field('client', $post_id);

    // get agency
    $post_agency = get_field('agency', $post_id);

    // get director
    $post_director = get_field('director', $post_id);

    // get year
    $post_year = get_field('year', $post_id);
    
    // get cover image
    
    // get video url
    $post_vid_url = get_field('video_link', $post_id);
    // generate video html
    $vid_html = genVideoHtml($post_vid_url);
    // $vid_html = genVideoHtml('');
    
    // get description
    $post_description = get_field('description', $post_id);


    
	
    // 	var_dump($post);
	if( $post ) { 	
        ?>

<!-- CUSTOM VIDEO PLAYER -->
<div id="mogulVidPlayer1">
    <div class="vidPlayerBg1"></div>
    <div class="vidPlayerMain">
        <video autoplay playsinline muted loop preload control='false'>
            <source src="https://mogulpictures.co.za/wp-content/uploads/2023/01/bud-light-millenial-beach.mp4" />
        </video>	
        <div class="vidPlayerControls">
            <div class="_main">
                <div class="pausePlayBtn">
                    <span class="_play"><?php echo $play1; ?></span>
                    <span clas="_pause"><?php echo $pause1; ?></span>
                </div>
                <div class="seekBar">
                    <span class="bar"></span>
                    <span class="head"></span>
                    <span class="playTime">00:00</span>
                </div>
                <div class="moreInfo"><span>↓</span> <span>info</span></div>
            </div>
        </div>
        <div class="vidMoreContent"></div>
    </div>
</div>
<!-- CUSTOM VIDEO PLAYER END -->
        
        <?php 
            } else {
            ?>
            <div class="infoBox">
                <h2>
                    Post Not Available. 		
                </h2>
                <a href="<?php echo home_url(); ?>" title="Home">Home</a>
                <a href="<?php echo home_url() . "/work"; ?>" title="Our Works">See Our Works</a>
            </div>
            
            <?php } 
            
            
        } ?>


</div> <!-- SHOWCASE VIDEO CONTENT -->

<?php 
get_header(); 
get_footer(); 
?>



