<?php
/**
 * Template Name: Upload Youtube From
 *
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package listeo
 */



$do="";
$postId='';
if(isset($_GET['do'])){
    $do=$_GET['do'];
}
$current_user = wp_get_current_user();

if ( $current_user->ID ) {
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	// get_template_part( 'template-parts/content/content-page' );
	?>
<style>
	
/*Main Div*/
.d-flex {
    display: flex;
    flex-direction: column;
    align-items: center;
}

/*Form */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 1em;
    width: 70%;
    box-shadow: 1px 1px 14px 4px  #57696b;
    padding:0 43px 43px 43px;
    border-radius: 7px;
}


form .form-heading{
    margin-bottom: 1.2em;
}

/*Div Hold the labels and inputs */
.form-group {
    margin-bottom: 1rem;
    width: 100%;
}

/* Inputs */
.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .form-control:focus{
    border:0.7px solid #31AFBE; 
    outline: none;
  }
  

input[type='file'] {
    display: none;
}

.lable-for-video {
    background-color: #31AFBE;
    padding: 0.5em 1.5em;
    border-radius: 8px;
    transition: .3s;
}


.lable-for-video:hover {
    cursor: pointer;
    background-color: #298994;
}

/*Submit Button*/
.submit {
    border: none;
    padding: 10px 0;
    width: 100%;
    border-radius: 7px;
    color: #fff;
    font-size: 16px;
    background-color: #31AFBE;
    transition: .3s;
    font-weight: 700;
}

.submit:hover {
    background-color: #298994;
    cursor: pointer;
}






@media only screen and (max-width: 850px) {
    form {
        width: 100%;
        padding: 0;
        min-height: 100vh;
        margin-top: 0;
    }
}
</style>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<div class=" d-flex">

<form method="post" action="?do=insert" class="form" enctype="multipart/form-data">
  
  
	<h1 class="form-heading">Add New</h1>
  
  
  <p>
    <?php
    
    if($do=='successfully'){
      echo 'post added ';
    }
    
    ?>
  </p>
  
  <div class="form-group">
                <label>Title:</label>
                <input type="text" name="post_title" class="form-control" required>
            </div>

           



            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="post_description" id="editor" cols="30" rows="10"></textarea>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </div>
  			<div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>


            <div class="form-group">
                <label>Category:</label>
                <select name="category" id="cars" required>

                <?php

              
$args = array( 'taxonomies' =>'listing_category' );

$categories = get_terms ( $args );
                foreach ( $categories as $category ) {
                    echo '<option value="'.$category->term_id .'" >' . $category->name . '</option>';
                }
                
                
                ?>
                </select>
            </div>
   <div class="form-group">
                <label for="number">Price:</label>
                <input type="number" name="price" class="form-control" required min='0'>
            </div>
  
  
  
  <h1 class="form-heading">Upload Video</h1>
	<div class="form-group">
		<label>Select Video: </label>
		<label class="lable-for-video" for="videoFile">Video File</label>
		<input type="file" name="video" id="videoFile" class="form-control" >
	</div>
	<div class="form-group">
		<label>Title:</label>
		<input type="text" name="title" class="form-control" >
	</div>

	

	<div class="form-group">
		<label>Description:</label>
		<textarea name="description" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Tags:</label>
		<input type="text" name="tags" class="form-control">
      
	<div class="form-group">
		<label>Privacy:</label>
		<select name="privacy" class="form-control">
			<option value="public">Public</option>
			<option value="private">Private</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" class="submit" name="submit" value="Upload">
	</div>
</form>
</div>

	<!-- Upload form
	<div class="col-md-12">
		<form method="get" action="http://localhost/wordpress/test" class="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Video File:</label>
				<input type="file" name="video" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Title:</label>
				<input type="text" name="title" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Description:</label>
				<textarea name="description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Tags:</label>
				<input type="text" name="tags" class="form-control">
			</div>
			<div class="form-group">
				<label>Privacy:</label>
				<select name="privacy" class="form-control">
					<option value="public">Public</option>
					<option value="private">Private</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" class="form-control btn-primary" name="submit" value="Upload">
			</div>
		</form>
	</div> -->
	<?php
	if ($do == 'insert') {
		if (isset($_POST) && !empty($_POST)) {
          
          // add post





			$addtitle = $_POST['post_title'];
       
			$addDesc = $_POST['post_description'];
			$addCat = $_POST['category'];
			$addPrice = $_POST['price'];
			$addPhone = $_POST['phone'];
            $postData = array(
                'post_title' => $addtitle,
                'post_author' =>  $current_user->ID,
                'post_id' => $post_id,
                'post_content' => $addDesc,
                'post_type' => 'listing', 
                'post_status'=>'publish'

            );


            // Insert the post into the database
            $post_id = wp_insert_post( $postData );

            // add category 

            $category_id = $addCat;  // Set the ID of the category you want to assign to the post
            wp_set_post_terms( $post_id, $category_id, 'category' );
            
            // save  to database
            // Replace with the ID of the post you want to add metadata to.
            add_post_meta( $post_id, '_phone', $addPhone );
            // serialize price 
            
            add_post_meta( $post_id, '_menu', 'a:1:{i:0;a:1:{s:13:"menu_elements";a:1:{i:0;a:4:{s:4:"name";s:10:"السعر";s:5:"price";s:10:"'.$addPrice.' جنية";s:16:"bookable_options";s:7:"onetime";s:11:"description";s:0:"";}}}}' );
            // add post meta 
				

             
          


          
          
          
			


			// upload video
			if (isset($_FILES['video'])  && ! empty( $_FILES['video']['name'])) {
				$video_name = $_FILES['video']['name'];
				$video_tmp_name = $_FILES['video']['tmp_name'];
				$video_size = $_FILES['video']['size'];
				$video_type = $_FILES['video']['type'];

				// Check if the file is a video
				if ($video_type != 'video/mp4' && $video_type != 'video/mpeg') {
					echo 'Error: Only MP4 and MPEG videos are allowed.';
					exit;
				}

				// Check if the file size is less than 100MB
				if ($video_size > 100000000) {
					echo 'Error: File size exceeds 100MB limit.';
					exit;
				}
				$fileV = $_FILES['video'];
				$upload = wp_upload_bits($fileV['name'], null, file_get_contents($fileV['tmp_name']));
				// Move the uploaded file to the desired directory
				// $upload_dir = 'videos/';
				// $video_path = $upload_dir . $video_name;
				// $videoData['path']=$video_path;
				$videoData['path'] = $upload['file'];

                $Videotitle = $_POST['title'];
                $user_id = $current_user->ID;
                $postID = $post_id;
                $Videodescription = $_POST['description'];
                $Videoprivacy = $_POST['privacy'];
                $Videotags = explode(' ', $_POST['tags']);




				// save  to database
				global $wpdb;

					$table_name =  'wp_videos';

					$data = array(
						'title' => $Videotitle,
						'user_id' => $user_id,
						'post_id' => $postID,
						'desc' => $Videodescription,
						'privacy' => $Videoprivacy,
                        'tags' =>$Videotags,
						'video_path' => $videoData['path'],
						'status' => 'pending',
					);

				$result = $wpdb->insert($table_name, $data ,array( '%s', '%d', '%d', '%s', '%s', '%s', '%s' ,'%s'  ));	
					if ($result) {
						echo 'Data inserted successfully';
                        
					} else {
						echo 'Error inserting data';
                      	print_r($result);
						echo $result ;
					}
              
              
			}
          
          $url = get_permalink();

                        wp_redirect( $url.'?do=successfully' );
                        exit;
		}
      
	}

	
	// If comments are open or there is at least one comment, load up the comment template.
	
endwhile; // End of the loop.

get_footer();
}
else{
  wp_redirect( wp_login_url() );
    exit;
}