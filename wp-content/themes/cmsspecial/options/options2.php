

  <div class="xiaot">
                     <b class="bt">模板微调</b><br />
                    <p>这里你可以设定各个页面、分类目录的显示数量、顶部图片</p>
                 
  </div>
    <div class="xiaot">
                     <b class="bt">内页布局替换</b><br />
                    <p>你可以调换内页布局左右的位置</p>
                      <?php $left_right =get_option('mytheme_left_right') ?>
                    <label  for="left_right ">是否显示多重筛选:</label>
                  <select name="left_right" id="left_right">
                   <option value=''<?php if ( $left_right ==="" ) {echo "selected='selected'";}?>>默认（右边显示主要内容）</option>
                    <option value='none'<?php if ( $left_right ==="none" ) {echo "selected='selected'";}?>>对调（左边显示主要内容）</option>
	             </select>  
                 
  </div>
            
            <div class="xiaot">
            
            
              
 
             <label  for="fenxiang">文章底部的固定文字、图片以及连接等：</label> 
           
              
              <?php  echo wp_editor(get_option('mytheme_fenxiang'),  "fenxiang"); ?>
              <p>在这里编辑一些图文、链接等信息，可以是您的网站固定推荐信息，他们会显示在每一篇文章的结尾。</p>
              
              
               <label  for="fenxiang2">文章底部的分享代码：</label> 
              
               <textarea name="fenxiang2" cols="86" rows="4" id="fenxiang2"><?php echo stripslashes(get_option('mytheme_fenxiang2')); ?></textarea>    
               
              <p>此处是文章内页和单页的百度分享代码替换框，若你想要使用其他的分享代码，可以获取代码粘贴到此处（如台湾、香港、澳门地区和海外地区用户不需要分享中国大陆的社交网站，可以使用此功能粘贴本地的分享代码，若不想使用此功能，可以打一些空格在里面即可）留空则显示默认的百度分享 </p>  
            
            <p>内页（页面、分类目录、文章页）的顶部图片设定，顶部图片这里统一为一张图片，这样做可以减少请求，让网站速度更快，并且看起来网站风格比较统一</p>
            <div class="up">
            <label  for="about_pic">背景图片(尺寸：1920*157)</label> 
              <input type="text" size="60"  name="top_pic" id="top_pic" value="<?php echo get_option('mytheme_top_pic'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
                
            </div>  
             <?php
		    $list_nmber1=get_option('mytheme_list_nmber1');
			$list_nmber2=get_option('mytheme_list_nmber2');
			$list_nmber3=get_option('mytheme_list_nmber3');
			$list_nmber4=get_option('mytheme_list_nmber4');
			$list_nmber5=get_option('mytheme_list_nmber5');
			
			$list_nmber_k1=get_option('mytheme_list_nmber_k1');
			$list_nmber_k2=get_option('mytheme_list_nmber_k2');
			$list_nmber_k3=get_option('mytheme_list_nmber_k3');
			$list_nmber_k4=get_option('mytheme_list_nmber_k4');
			$list_nmber_k5=get_option('mytheme_list_nmber_k5');
			

		    ?>    
                      
              <div class="xiaot">
            <p>当前使用的免费版只能使用默认的列表模板，使用付费版可以获得6种不同样式的列表模板<a target="_blank" href="http://www.themepark.com.cn/ffmhwordpressqyzt.html"> 查看付费版详情</a></p>
             
              
               <p> <label  for="list_nmber2">默认模板（小图片加上文字）：</label> 
                <input type="text" size="20"  name="list_nmber2" id="list_nmber2" value="<?php if($list_nmber2!=""){echo $list_nmber2;}else{echo '12';}  ?>"/  />
                
                      
              </p> 
              
               <p> <label  for="list_nmber1">纯文字列表模板：</label> 
                  <input type="text" size="20"   value="当前版本不可用"readonly="true"  />
                    
              </p>  
               <p> <label  for="list_nmber3">大图文列表：</label> 
                <input type="text" size="20"   value="当前版本不可用"readonly="true"  />
                 
              </p> 
              
             
              
               <p> <label  for="list_nmber5">图片列表（大图一栏）：</label> 
               <input type="text" size="20"   value="当前版本不可用"readonly="true"  />
                
              
            </div>          
                      
            <div class="xiaot">
                <b class="bt">侧边栏悬浮模块设置</b><br />
                <?php $kefu_on =  get_option('mytheme_kefu_on'); ?>
                 <label  for="kefu_on">是否显示悬浮:</label>
                  <select name="kefu_on" id="kefu_on">
                   <option value=''<?php if ( $kefu_on ==="" ) {echo "selected='selected'";}?>>显示</option>
                    <option value='none'<?php if ( $kefu_on ==="none" ) {echo "selected='selected'";}?>>不显示</option>
	             </select>   
                  <div class="up">
                      <label  for="about_pic">二维码上传（尺寸：210*210）</label> 
                      <input type="text" size="40"  name="kefu_weixin" id="kefu_weixin" value="<?php echo get_option('mytheme_kefu_weixin'); ?>"/>   
                      <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
                  </div> 
                  
                   <div class="up">
                      <label  for="qq_tu">客服头部图片替换</label> 
                      <input type="text" size="40"  name="qq_tu" id="qq_tu" value="<?php echo get_option('mytheme_qq_tu'); ?>"/>   
                      <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
                  </div> 
                    <div class="up">
                    <label  for="kefu_qq">客服qq代码添加</label>
                    <textarea name="kefu_qq" cols="86" rows="4" id="kefu_qq"><?php echo stripslashes(get_option('mytheme_kefu_qq')); ?></textarea>
                    <p>登录QQ，并且进入这个网址<a href="http://shang.qq.com/widget/consult.php" target="_blank">http://shang.qq.com/widget/consult.php</a>,将获取的代码粘贴进来，支持多个qq客服代码添加</p>
                      </div>    
               </div>                                        
            
            
            
           
                   
                     