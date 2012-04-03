<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<link href="<?php echo SKIN_PATH;?>modal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="images/js/jqModal.js"></script>
<script type="text/javascript" src="images/js/validator.js"></script>
<div id="main">
  <form action="" method="post" name="registerform" id="registerform">
    <table cellpadding="0" cellspacing="1" class="table_reg">
      <caption>
      新用户注册
      </caption>
  <?php if($modelid && $M['choosemodel'] && $member->count_model() >= 2) { ?>
  <tr>
<th width="12%">所在模型</th>
<td width="*"><?php echo $MODEL[$modelid]['name'];?></td>
  </tr>
  <?php } ?>
      <tr>
        <th width="12%">用户名：</th>
        <td width="*"><input type="text" name="memberinfo[username]" id="reg_username" value="" size="20" maxlength="20"  require="true" datatype="limit|ajax" url="<?php echo $M['url'];?>register.php?action=checkuser" min="3" max="20" msg="用户名不得少于3个字符超过20个字符|" /></td>
      </tr>
      <tr>
        <th>密　码：</th>
        <td><input name="memberinfo[password]" require="true" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！"  type="password" id="reg_password" size="20" maxlength="16" /></td>
      </tr>
      <tr>
      <th>密码强度：</th>
      <td>
        <div id="pw_check_1" class="pw_check" style="display:none;"><span><strong class="c_orange">弱</strong></span><span>中</span><span>强</span></div>
        <div id="pw_check_2" class="pw_check" style="display:none;"><span>弱</span><span><strong class="c_orange">中</strong></span><span>强</span></div>
        <div id="pw_check_3" class="pw_check" style="display:none;"><span>弱</span><span>中</span><span><strong class="c_orange">强</strong></span></div></td>
   	 </tr>
      <tr>
        <th>确认密码：</th>
        <td><input name="pwdconfirm" type="password" require="true" datatype="repeat" to="memberinfo[password]" msg="两次输入的密码不一致" id="pwdconfirm" size="20" maxlength="20" /></td>
      </tr>
      <?php if($M[enableQchk]) { ?>
      <div>
      <tr>
        <th>密码提示问题：</th>
        <td>
<select name="memberinfo[question]" id="question" tabindex=4 alt="密码查询问题:无内容">
            <option selected value="">请您选择</option>
            <option value="我手机号码的后6位？">我手机号码的后6位？</option>
            <option value="我母亲的生日？">我母亲的生日？</option>
            <option value="我父亲的生日？">我父亲的生日？</option>
            <option value="我最好朋友的生日？">我最好朋友的生日？</option>
            <option value="我儿时居住地的地址？">我儿时居住地的地址？</option>
            <option value="我小学校名全称？">我小学校名全称？</option>
            <option value="我中学校名全称？">我中学校名全称？</option>
            <option value="离我家最近的医院全称？">离我家最近的医院全称？</option>
            <option value="离我家最近的公园全称？">离我家最近的公园全称？</option>
            <option value="我的座右铭是？">我的座右铭是？</option>
            <option value="我最喜爱的电影？">我最喜爱的电影？</option>
            <option value="我最喜爱的歌曲？">我最喜爱的歌曲？</option>
            <option value="我最喜爱的食物？">我最喜爱的食物？</option>
            <option value="我最大的爱好？">我最大的爱好？</option>
            <option value="我最喜欢的小说？">我最喜欢的小说？</option>
            <option value="我最喜欢的运动队？">我最喜欢的运动队？</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>问题答案：</th>
        <td><input name="memberinfo[answer]" type="text" id="answer" size="30" require="true" datatype="limit" min="1" msg="问题答案不能为空" /></td>
      </tr>
      <?php } ?>
      <tr>
        <th>Email地址：</th>
        <td><input name="memberinfo[email]" type="text"  style="ime-mode:disabled" require="true" datatype="email|ajax" url="<?php echo $M['url'];?>register.php?action=checkemail" msg="邮件格式不正确|" id="email" size="30" />
        </td>
      </tr>
   <?php if($M[enablecheckcodeofreg]) { ?>
  <tr>
        <th>验证码：</th>
        <td><input name="checkcodestr" type="text" style="ime-mode:disabled" require="true" datatype="limit" min="4" max="4" msgid="code" msg="验证码必须填写" size="6" />
          &nbsp;<img src="checkcode.php" id="checkcode" onClick="this.src='checkcode.php?id='+Math.random()*5;" style="cursor:pointer;" alt="验证码,看不清楚?请点击刷新验证码" align="absmiddle" class="color_1" />&nbsp;<span class="color_1"></span><span id="code"></span>
        </td>
      </tr>
  <?php } ?>
      <input type="hidden" name="memberinfo[modelid]" value="<?php if($modelid) { ?><?php echo $modelid;?><?php } else { ?>10<?php } ?>"  />
  <tr>
        <th></th>
        <td> <input type="checkbox" name="regagreement" id="regagreement" checked="checked" value="1" datatype="group" min="1" max="1" require="true" msg="请选择是否同意网站协议" msgid="reg" /><a href="javascript:void(0);" id="regagree" onClick="modal('member/reagreement.php', this.id, 'toggle_pannel', 'ajax')"> 阅读并同意《<?php echo $WSLM['sitename'];?>网络服务使用协议》</a>
        <span id="reg" ></span>
        </td>
      </tr>
      <input name="action" type="hidden" value="register" />
      <tr>
      <th></th>
        <td>
<input type="submit" name="dosubmit" id="registerform" value="  注  册  " />
<input type="reset" name="reset" value="  重  置  " />		
</td>
      </tr>
    </table>
  </form> 
  <span id="toggle_pannel"></span>
  </div>
<?php include template('member','footer'); ?>
<script language="javascript" type="text/javascript">
$().ready(function() {
  $('form').checkForm(1);
});

$('#reg_password').blur(function(){
ShowStrong();
 });
 
function CharMode(iN)
{
if (iN>=65 && iN <= 90)
return 2;
if (iN>=97 && iN <= 122)
return 4;
else
return 1;
}

function bitTotal(num)
{
modes = 0;
for(i=0; i<3; i++)
{
if (num & 1) modes++;
num >>>= 1;
}
return modes;
}

function checkStrong(sPW){
Modes=0;

for (i=0;i<sPW.length;i++){
//测试每一个字符的类别并统计一共有多少种模式.
Modes|=CharMode(sPW.charCodeAt(i));
}
var btotal = bitTotal(Modes);
if (sPW.length >= 10) btotal++;
switch(btotal) {
case 1:
return "pw_check_1";
break;
case 2:
return "pw_check_2";
break;
case 3:
return "pw_check_3";
break;
default:
return "pw_check_1";
}
}

function ShowStrong(){
var data = checkStrong($('#reg_password').val());
pw_id = '#' + data;
$(".pw_check").hide();
$(pw_id).show();
}

</script>
