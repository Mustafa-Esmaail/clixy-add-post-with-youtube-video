<?php
/**
 * Template Name: Upload Youtube Table
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
get_header();
global $wpdb;

$table_name =  'wp_videos';

$results = $wpdb->get_results( "SELECT * FROM $table_name" );


/* Start the Loop */
while ( have_posts() ) :
	the_post();
	// get_template_part( 'template-parts/content/content-page' );
	?>
<style>

.container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.main-table-body {
    width: 90%;
    background-color: #ffffff;
    border-collapse: collapse;
    border-width: 2px;
    border-color: rgb(54, 54, 54);
    border-style: solid;
    color: #000000;
}

.main-table-body td,
.main-table-body th {
    border-width: 2px;
    border-color: rgb(54, 54, 54);
    border-style: solid;
    padding: 3px;
    text-align: center;
}

.main-table-body thead {
    background-color: #31AFBE;
}

.action {
    margin: 8px;
    border: none;
    padding: 7px 0;
    width: 5em;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    background-color: #31AFBE;
    transition: .3s;
    font-weight: 700;
}

.action:hover{
    background-color: #298994;
    cursor: pointer;
}
</style>
  <div class="container">

        <h1>Video Requests</h1>
        <table class="main-table-body" id="userTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Video Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Tags</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody id="table-body-data">
              <?php
              
              foreach ( $results as $result ) {

              ?>
                <tr class="content">
                    <td><?php 
                $user = get_user_by( 'ID', $user_id );
                
              
                echo $user->display_name;  ?></td>
                    <td><?php echo (!empty( $result->title)) ?  $result->title : ' ';   ?></td>
                    <td><?php echo (!empty( $result->desc)) ?  $result->desc : ' ';  ?></td>
                    <td><?php echo  (!empty( $result->status)) ?  $result->status : ' ';   ?> </td>
                    <td><?php 
                
                
                if(isset($result->tags) && !empty($result->tags)){
                  $tags=implode($result->tags);
                      foreach ( $tags as $tag ){
                echo $tag;
              }
                }
                
                      
                      ?>
                    </td>
                    <td>
                        <button class="action">Video</button>
                        <a  href="https://clixy.net/fortest/upload-video?vidID=<?php echo  $result->id ?>" class="action">Submit</a>
                    </td>
                </tr>
                <?php
                
}
              ?>
            </tbody>
        </table>
    </div>





	<?php
	
	
	// If comments are open or there is at least one comment, load up the comment template.
	
endwhile; // End of the loop.

get_footer();
