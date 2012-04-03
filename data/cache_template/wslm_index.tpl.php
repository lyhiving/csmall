<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template('wslm','header'); ?>
            <div class="index-banner">
                <div class="mosaic banner-1">
                	<?php $cid=64?>
                	<?php echo tag('wslm', 'tag_content_index_hover', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.userid,b.link,a.listorder FROM `wslm_content` a, `wslm_c_picdeslink` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($cid)." ORDER BY a.listorder DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-2">
                	<?php $cid=65?>
                	<?php echo tag('wslm', 'tag_content_index_nhover', "SELECT contentid,catid,title,thumb,userid,updatetime,inputtime,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY contentid DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-3">
<?php $cid=66?>
                    <?php echo tag('wslm', 'tag_content_index_hover', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.userid,b.link,a.listorder FROM `wslm_content` a, `wslm_c_picdeslink` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($cid)." ORDER BY a.listorder DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-4" id="index_small_cycle">
                	<?php $cid=67?>
                	<?php echo tag('wslm', 'tag_content_index_change', "SELECT contentid,catid,title,thumb,userid,updatetime,inputtime,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY listorder DESC", 0, 10, array ());?>
                </div>
                <div class="mosaic banner-5">
<?php $cid=68?>
                    <?php echo tag('wslm', 'tag_content_index_hover', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.userid,b.link,a.listorder FROM `wslm_content` a, `wslm_c_picdeslink` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($cid)." ORDER BY a.listorder DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-6" id="index_big_cycle">
                	<?php $cid=69?>
                	<?php echo tag('wslm', 'tag_content_index_change', "SELECT contentid,catid,title,thumb,userid,updatetime,inputtime,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY listorder DESC", 0, 10, array ());?>
                </div>
                <div class="mosaic banner-7">
                    <?php $cid=70?>
                    <?php echo tag('wslm', 'tag_content_index_nhover', "SELECT contentid,catid,title,thumb,userid,updatetime,inputtime,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY contentid DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-8">
                    <?php $cid=71?>
                    <?php echo tag('wslm', 'tag_content_index_hover', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.userid,b.link,a.listorder FROM `wslm_content` a, `wslm_c_picdeslink` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($cid)." ORDER BY a.listorder DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-9">
                    <?php $cid=72?>
                    <?php echo tag('wslm', 'tag_content_index_nhover', "SELECT contentid,catid,title,thumb,userid,updatetime,inputtime,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY contentid DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-10">
<?php $cid=73?>
                    <?php echo tag('wslm', 'tag_content_index_hover', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.userid,b.link,a.listorder FROM `wslm_content` a, `wslm_c_picdeslink` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($cid)." ORDER BY a.listorder DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-11">
                	<?php $cid=74?>
                    <?php echo tag('wslm', 'tag_content_index_nhover', "SELECT contentid,catid,title,thumb,userid,updatetime,inputtime,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY contentid DESC", 0, 1, array ());?>
                </div>
                <div class="mosaic banner-12">
                    <?php $cid=75?>
                    <?php echo tag('wslm', 'tag_content_index_hover', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.userid,b.link,a.listorder FROM `wslm_content` a, `wslm_c_picdeslink` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($cid)." ORDER BY a.listorder DESC", 0, 1, array ());?>
                </div>
            </div>
            <div class="ym-grid">
                <div class="ym-w320 ym-gl">
                    <div class="ym-gbox index-news">
                        <h2 class="roll"><a href="<?php echo $CATEGORY['17']['url'];?>" title="<?php echo $CATEGORY['17']['name'];?>" class="s-index-ntitle-notice"></a></h2>
                        <ul>
                            <?php $cid=17?>
                            <?php echo tag('wslm', 'tag_content_index_news_list', "SELECT contentid,catid,title,thumb,description,userid,updatetime,inputtime,url,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY listorder DESC", 0, 3, array ());?>
                        </ul>
                    </div>
                </div>
                <div class="ym-w320 ym-gl ml-10">
                    <div class="ym-gbox index-news">
                        <h2 class="roll"><a href="<?php echo $CATEGORY['18']['url'];?>" title="<?php echo $CATEGORY['18']['name'];?>" class="s-index-ntitle-info"></a></h2>
                        <ul>
                            <?php $cid=18?>
                            <?php echo tag('wslm', 'tag_content_index_news_list', "SELECT contentid,catid,title,thumb,description,userid,updatetime,inputtime,url,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY listorder DESC", 0, 3, array ());?>
                        </ul>
                    </div>
                </div>
                <div class="ym-w320 ym-gr">
                    <div class="ym-gbox index-news">
                        <h2 class="roll"><a href="<?php echo $CATEGORY['16']['url'];?>" title="<?php echo $CATEGORY['16']['name'];?>" class="s-index-ntitle-news"></a></h2>
                        <ul>
                            <?php $cid=16?>
                            <?php echo tag('wslm', 'tag_content_index_news_list', "SELECT contentid,catid,title,thumb,description,userid,updatetime,inputtime,url,listorder FROM `wslm_content` WHERE  status=99  ".get_sql_catid($cid)." ORDER BY listorder DESC", 0, 3, array ());?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="ym-grid index-plan mt-10 mb-20">
                <div class="ym-230 ym-gl">
                    <div class="plan-1"><a href="" title=""><img src="<?php echo SKIN_PATH;?>images/class_12.jpg" alt=""></a></div>
                </div>
                <div class="ym-230 ym-gl ml-20">
                    <div class="plan-2"><a href="" title=""><img src="<?php echo SKIN_PATH;?>images/class_12.jpg" alt=""></a></div>
                </div>
                <div class="ym-230 ym-gl ml-20">
                    <div class="plan-3"><a href="" title=""><img src="<?php echo SKIN_PATH;?>images/class_12.jpg" alt=""></a></div>
                </div>
                <div class="ym-230 ym-gl ml-20">
                    <div class="plan-4"><a href="" title=""><img src="<?php echo SKIN_PATH;?>images/class_12.jpg" alt=""></a></div>
                </div>
                <div class="ym-230 ym-gl mt-20">
                    <div class="plan-5"><a href="" title=""><img src="<?php echo SKIN_PATH;?>images/class_12.jpg" alt=""></a></div>
                </div>
                <div class="ym-230 ym-gl ml-20 mt-20">
                    <div class="plan-6"><a href="" title=""><img src="<?php echo SKIN_PATH;?>images/class_12.jpg" alt=""></a></div>
                </div>
                <div class="ym-230 ym-gl ml-20 mt-20">
                    <div class="plan-7"><a href="" title=""><img src="<?php echo SKIN_PATH;?>images/class_12.jpg" alt=""></a></div>
                </div>
                <div class="ym-230 ym-gl ml-20 mt-20">
                    <div class="plan-8"><a href="" title=""><img src="<?php echo SKIN_PATH;?>images/class_12.jpg" alt=""></a></div>
                </div>
            </div>
<?php include template('wslm','footer'); ?>