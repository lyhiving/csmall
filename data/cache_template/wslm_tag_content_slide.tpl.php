<?php function _tag_wslm_tag_content_slide($data, $number, $rows, $count, $page, $pages, $setting){ global $WSLM,$MODULE,$M,$CATEGORY,$TYPE,$AREA,$GROUP,$MODEL,$templateid,$_userid,$_username;@extract($setting);?><?php if(is_array($data)) foreach($data AS $n => $r) { ?>
<?php $flash_texts .= str_replace('"',"'",$r[title]).'|';$flash_pics .= thumb($r[thumb], $width, $height).'|';$flash_links .= $r[url].'|';?>
<?php } ?>
<?php $flash_texts=substr($flash_texts,0,-1);$flash_pics=substr($flash_pics,0,-1);$flash_links=substr($flash_links,0,-1);?>

<script type="text/javascript">
//<![CDATA[
var interval_time=0;
var focus_width=<?php echo $width;?>;
var focus_height=<?php echo $height;?>;
var text_height=24;
var text_align="center";
var swf_height=focus_height+text_height;
var pics="<?php echo $flash_pics;?>";
var links="<?php echo $flash_links;?>";
var texts="<?php echo $flash_texts;?>";
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
document.write('<param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="images/focus.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#F0F0F0">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
document.write('<embed src="images/focus.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#F0F0F0" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
document.write('</object>');
//]]>
</script><?php } ?>