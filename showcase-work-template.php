<?php

// Template Name: Showcase Work Layout

get_header(); 
$post_id =  $_GET['work_id'];

// $qposts = new WP_Query(array(
// 	'post_status' => 'publish',
// 	'post_type' => 'mogul_works',
// 	'posts_per_page' => $post_count,
// 	'orderby' => 'date', 
// 	'order' => 'desc', 
// ));

// $posts = $qposts->get_posts();


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

<div id="showcaseWorkContent">
	
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

    // get year
    $post_year = get_field('year', $post_id);
    
    // get cover image
    
    // get video url
    $post_vid_url = get_field('preview_video_link', $post_id);
    // generate video html
    $vid_html = genVideoHtml($post_vid_url);
    // $vid_html = genVideoHtml('');
    
    // get description
    $post_description = get_field('description', $post_id);


    
	
    // 	var_dump($post);
	if( $post ) { 	
?>
<div class="post_bx">
    <div class="_title"><?php echo $post_title; ?></div>
    <div class="_media">        
        <div class="_video_bx">
            <!-- <div class="_playBtn"></div> -->
            <div class="_vid"><?php echo $vid_html; ?></div>
        </div>
        <div class="_desc">
            <div class="_bx1">
                <?php echo $post_description; ?> 
            </div>
            <div class="_bx2 _gridBx1">
                <div class="_txt1">Year</div><div class="_txt2"><?php echo $post_year; ?></div>
                <div class="_txt1">Director</div><div class="_txt2">Ernest Nkosi</div>
                <div class="_txt1">Client</div><div class="_txt2"><?php echo $post_client; ?></div>
            </div>
        </div>
    </div>
</div>

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


</div> <!-- SHOWCASE WORK CONTENT -->

<?php get_footer(); ?>


