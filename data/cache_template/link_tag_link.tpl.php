<?php function _tag_link_tag_link($data, $number, $rows, $count, $page, $pages, $setting){ global $WSLM,$MODULE,$M,$CATEGORY,$TYPE,$AREA,$GROUP,$MODEL,$templateid,$_userid,$_username;@extract($setting);?><?php if(is_array($data)) foreach($data AS $i => $link) { ?>
<a href="<?php echo $link['url'];?>" target="_blank" title="<?php echo $link['introduce'];?>" onclick="$.get('<?php echo $MODULE['link']['url'];?>count.php?linkid=<?php echo $link['linkid'];?>')" ><?php echo $link['name'];?></a> <?php if($link[showhits]) { ?>[<?php echo $link['hits'];?>]<?php } ?>
<?php } ?><?php } ?>