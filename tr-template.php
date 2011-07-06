<?php
/*
TweetRandom.com Feed
*/ 
$posts = query_posts('posts_per_page=1&orderby=rand');
 
header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0"?>';
?><rss version="2.0">
<channel>
  <title><?php bloginfo('name'); ?></title>
  <link>http://tweetrandom.com/</link>
  <description>Feed which helps you tweet random stuff</description>
  <language>en-us</language>
  <managingEditor>support@tweetrandom.com</managingEditor>
<?php foreach ($posts as $post) { ?>
  <item>
    <title><?php echo get_the_title($post->ID); ?></title>
    <link><?php echo get_permalink($post->ID); ?></link>
    <guid><?php echo get_permalink($post->ID); ?></guid>
  </item>
<?php } ?>
</channel>
</rss>