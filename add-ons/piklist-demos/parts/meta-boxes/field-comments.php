<?php
/*
Title: Comments <span class="piklist-title-right">Order 30</span>
Post Type: piklist_demo
Order: 30
Priority: default
Context: side
Collapse: true
*/

  piklist('field', array(
    'type' => 'comments'
    ,'label' => 'Notes'
    ,'description' => 'Add some notes'
  ));

?>

<?php

  global $post, $current_user, $wp_post_statuses;
  
  get_currentuserinfo();

  $comments = get_comments(array(
    'post_id' => $post->ID
  ));

?>

<?php if ($comments): ?>

  <?php $date_format = get_option('date_format'); ?>
  <?php $time_format = get_option('time_format'); ?>

  <div class="piklist-field-container">

    <div class="piklist-label-container"></div>

      <div class="piklist-field">
        
        <?php foreach ($comments as $comment): ?>

          <div style="padding: 5px 10px 5px 10px;">
            
            <p>

              <small>

                <?php echo $comment->comment_author; ?>

                <?php printf(__('on %s', 'piklist'), get_comment_date( 'l jS F, Y, g:ia', $comment->comment_ID)); ?><br>
                <?php printf(__('Status: %s', 'piklist'), $wp_post_statuses[$post->post_status]->label); ?>

              </small>

            </p>

            <?php echo $comment->comment_content; ?>

          </div>

        <?php endforeach; ?>

      </div>

  </div>

<?php endif; ?>

<?php

  piklist('shared/code-locater', array(
    'location' => __FILE__
    ,'type' => 'Meta Box'
  ));
  
?>