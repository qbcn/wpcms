<div class="xiaot"> 
                	 <?php $eso_jr = get_option('mytheme_eso_jr'); ?>  
                <label  for="eso_jr ">是否屏蔽主题自带的seo输出:</label>
                  <select name="eso_jr" id="eso_jr">
                   <option value=''<?php if ( $eso_jr ==="" ) {echo "selected='selected'";}?>>不屏蔽</option>
                    <option value='none'<?php if ( $eso_jr ==="none" ) {echo "selected='selected'";}?>>屏蔽</option>
	             </select>   
                 <p>如果你选择了屏蔽主题自带的SEO输出，那么主题自带的关键词、描述和标题将不会显示出来，这个选项是方便你使用一些插件的SEO选项而设定的，如果你没有使用相关seo插件，那么这个选项请勿选择<br />
<strong style="color:red">当前使用的是免费版主题，一些seo功能不可用，付费版可以替换全站的标题、关键词和描述，并且可以独立设置移动版。<a target="_blank" href="http://www.themepark.com.cn/ffmhwordpressqyzt.html"> 查看付费版详情</a></strong></p>
                </div>

 <div class="up">
                    <b class="bt">首页title替换（pc）</b>
                      <input type="text" size="20"   value="当前版本不可用"readonly="true"  />
                    <p>默认调用的是设置--常规中的站点标题+副标题</p>
                </div> 

   <div class="up">
                    <b class="bt">网站关键字填写（pc）</b>
                    <textarea name="keywords" cols="86" rows="3" id="keywords"><?php echo get_option('mytheme_keywords'); ?></textarea>   
                    <p>请填写网站的关键字，使用“ , ”分开，一个网站的关键字一般不超过100个字符。</p>
                </div>   
                
                 <div class="up">
                    <b class="bt">网站描述填写（中文）</b>
                    <textarea name="description" cols="86" rows="3" id="description"><?php echo get_option('mytheme_description'); ?></textarea>    
                    <p>请填写网站的描述，使用,分开，一个网站的描述一般不超过200个字符。</p>
                </div>   
                
                
                
 <div class="up">
                    <b class="bt">首页title替换（移动版）</b>
                     <input type="text" size="20"   value="当前版本不可用"readonly="true"  />
                    <p>默认调用的是设置--常规中的站点标题+副标题</p>
                </div> 

   <div class="up">
                    <b class="bt">网站关键字填写（移动版）</b>
                    <input type="text" size="20"   value="当前版本不可用"readonly="true"  />
                    <p>请填写网站的关键字，使用“ , ”分开，一个网站的关键字一般不超过100个字符。</p>
                </div>   
                
                 <div class="up">
                    <b class="bt">网站描述填写（移动版）</b>
                     <input type="text" size="20"   value="当前版本不可用"readonly="true"  />
                    <p>请填写网站的描述，使用,分开，一个网站的描述一般不超过200个字符。</p>
                </div>   
                   

                      <div class="up">    
                    <b class="bt">网站统计代码添加</b>
                    <textarea name="analytics" cols="86" rows="4" id="analytics"><?php echo stripslashes(get_option('mytheme_analytics')); ?></textarea>    
                 
                 <a href="http://www.themepark.com.cn/wordpresswzseohj.html">网站的seo应该如何去做？ 我们给你一些文章作为参考</a>
  </div>  


  <div class="xiaot">
            <b class="bt">网站底部设定</b><br />
            <p>网站首页底部联系我们的一些设定</p>
                     <?php   
					 $contact_title= get_option('mytheme_contact_title');
					 $contact_title_2= get_option('mytheme_contact_title_2');
					 $tell = get_option('mytheme_tell');
					 $email= get_option('mytheme_email');
					 $icp_b=get_option('mytheme_icp_b');
					 $icp_b=get_option('mytheme_icp_b');
					 $two_code_title=get_option('mytheme_two_code_title');
					 $two_code_title2=get_option('mytheme_two_code_title2');
					 $two_code=get_option('mytheme_two_code');
					 $maps=get_option('mytheme_maps');
					 $maps_link=get_option('mytheme_maps_link');
					 $message_title= get_option('mytheme_message_title');
					 $message_title_2= get_option('mytheme_message_title_2'); 
				
				
					
		               ?>
            
       
       
               
           
            
            
            <div class="xiaot">

          
    
         <p>
         <?php $themepark= get_option('mytheme_themepark'); ?>
                         <label  for="themepark">显示WEB主题公园的技术支持:</label>
                         <select name="themepark" id="themepark">
	                      <option value='' <?php if ($themepark=="") {echo "selected='selected'";}?>>显示中文</option>
                          <option value='en' <?php if ($themepark=='en') {echo "selected='selected'";}?>>显示英文</option>
                         <option value='none' <?php if ($themepark=='none') {echo "selected='selected'";}?>>不显示</option>
	                  </select><br />
                      <a>WEB主题公园的主题下方会有一个“技术支持：WEB主题公园”的信息，如果你给予了保留，那么我们将会非常感激！</a>
                      </p>
      
        <b class="bt">ICP备案</b><br />
      <label  for="two_code_title">icp备案号，没有可以不填：</label>        
       <input type="text" size="60"  name="icp_b" id="icp_b" value="<?php echo $icp_b;?>"/>  <br />

                  
     
        </div>
                  
</div>
 </div>
   