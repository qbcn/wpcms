
<div class="xiaot">
    <input type="checkbox" value="shop_ok" name="theme_shop_open" id="theme_shop_open" <?php if(get_option('mytheme_theme_shop_open')=="shop_ok"){echo "checked='checked'";} ?> />
    <label for="theme_shop_open">开启兼容购物盒子插件</label>
    <p>开启购物盒子插件之后，首页调用文章模块中如果文章启用了插件中的是商品模式，会显示价格、原价、包邮等信息。分类目录中的《大图文列表》《图片列表》以及内页《产品展示模板（一栏模式以及默认模式）》均会显示商品信息，内页模板点击购买按钮会出现提交订单表单和商品评分和评价模块。 <br />
购物盒子（shoppingbox）是WEB主题公园开发的一款能够支持在线付款的插件，本主题已经优化兼容，详情请见购物盒子的使用教程：<a target="_blank" href="http://www.themepark.com.cn/shoppingbox-WordPress-plugins">点击弹出查看</a><br />
<strong>请第一次使用这个插件的用户参考教程设置，购物盒子自带前端用户注册、登录和个人中心，需要初始化手动设置之后才能生效。</strong></p>

  <b class="bt">社区内页模板选择</b>
               <p>付费版可以使用社区内页模板选择，可选一栏模式或者2栏模式的社区样式<a target="_blank" href="http://www.themepark.com.cn/ffmhwordpressqyzt.html"> 查看付费版详情</a></p>
            

 </div>

 <div class="xiaot">
 
              <b class="bt">多重筛选模块功能控制</b>
               <p>多重筛选模块，添加了这个模块请在菜单的“<strong>搜索菜单（搜索和标签页面显示）</strong>”中按照要求建立好菜单，教程请看：<a target="_blank" href="http://www.themepark.com.cn/wordpressdzsxgnjs.html">WEB主题公园多筛选功能教程</a></p>
            <p>付费版可以使用多重筛选的功能，并可以选择搜索栏目和多重筛选结果页面的显示模板<a target="_blank" href="http://www.themepark.com.cn/ffmhwordpressqyzt.html"> 查看付费版详情</a></p>
</p>


              </div>
 
               
                <div class="up">
                 
                     
                    <b class="bt">ICO图标上传</b>
                    <input type="text" size="80"  name="ico" id="ico" value="<?php echo get_option('mytheme_ico'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                    <p><a href="http://www.themepark.com.cn/icotpssmrhzzicowj.html" target="_blank">ico是什么？ico图片制作教程</a></p>
                </div>     
                
                        
                
                
                
	 <div class="up">
                    <b class="bt">自定义样式</b>
                    <textarea name="zdycss" cols="86" rows="3" id="zdycss"><?php echo stripslashes(get_option('mytheme_zdycss')); ?></textarea>   
                    <p>你可以在此处自定义某些样式，直接输入css样式代码即可发送到网站顶部以实现（注意！这个样式在网站所有的状态和页面均可实现，包括移动版）</p>
                </div>   	
      
       <?php include_once("pic.php"); ?>               
    </div>
     

                                                     
            
            
            
           
                   
                         
           
                   
                     