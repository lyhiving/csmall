var votehtml = '<div class=\"titles\" id=\"xinqing\">  <h3><span style=\"float:right;width:100px;\"><a href=\"http://127.0.0.1/wslm/mood/rank.php?moodid=2\">查看心情排行</a></span>您看到此视频时的感受是：</h3>  <ul>      <li><img src=\"mood/images/zhichi.gif\" alt=\"支持\"/><br>支持<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(1);return false;\"></li>      <li><img src=\"mood/images/gaoxing.gif\" alt=\"高兴\"/><br>高兴<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(2);return false;\"></li>      <li><img src=\"mood/images/zhenjing.gif\" alt=\"震惊\"/><br>震惊<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(3);return false;\"></li>      <li><img src=\"mood/images/fennu.gif\" alt=\"愤怒\"/><br>愤怒<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(4);return false;\"></li>      <li><img src=\"mood/images/wunai.gif\" alt=\"无奈\"/><br>无奈<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(5);return false;\"></li>      <li><img src=\"mood/images/huangyan.gif\" alt=\"谎言\"/><br>谎言<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(6);return false;\"></li>      <li><img src=\"mood/images/qianggao.gif\" alt=\"枪稿\"/><br>枪稿<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(7);return false;\"></li>      <li><img src=\"mood/images/bujie.gif\" alt=\"不解\"/><br>不解<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(8);return false;\"></li>      <li><img src=\"mood/images/gaoxiao.gif\" alt=\"搞笑\"/><br>搞笑<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(9);return false;\"></li>      <li><img src=\"mood/images/wuliao.gif\" alt=\"无聊\"/><br>无聊<br><input type=\'radio\' value=\"1\" name=\'moodradio\' onClick=\"javascript:vote(10);return false;\"></li>    </ul></div>';document.getElementById("moodrank_div").innerHTML = votehtml;function vote(vote_id) {document.getElementById("moodrank_div").innerHTML = "处理中...";document.getElementById("callback_js").src = "http://127.0.0.1/wslm/mood/callback.php?moodid=2&contentid=" + contentid+"&vote_id="+vote_id;}