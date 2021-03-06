<?php
//------------ style.css ----------

/*
Theme Name: MN-theme
Author: Mostafa Norzade
Author URI: http://mostafanorzade.ir/
Description: Bootstrap Blog template converted to WordPress
Version: 0.0.1
*/

//------------- bloginfo('') ----------

//خروجی این تابع مستقیما چاپ میشه و نیازی به اکو کردن نداریم .
bloginfo('');             //name of site
bloginfo('name');         //name of site
boginfo('description');   //description of site
blogino('url');           //url site --- www.exampel.com  or  localhost
bloginfo('admin_email');  //admin email


//example
<a href="mailto:<?php bloginfo('admin_email'); >">ارسال ایمیل به مدیر</a>

bloginfo('template_url');        //theme url ---localhost/wp-content/themes/mytheme
bloginfo('stylesheet_url')       //style.css url ---localhost/wp-content/themes/mytheme/style.css
bloginfo('version');             // version of wordpress
bloginfo('charset');             // charset of wordpress
bloginfo('language');            // language of wordpress


//------------ get_blogingo('') -------------

//ma inja tabei darim be name get_bloginfo() . tamame arguman hay bloginfo() ro migire. tefavotesh ine ke chizi ro baramon
//chap nemikone . faghat barmigardone . masalan : get_blogingo('name') hich chizi be ma neshon nemide . vali mitonim berizimesh
//to ye variable va ouno chap konim . 

$name = get_bloginfo('name');
echo $name;


//-------------- MainLoop -------------------

//halghe asli wordpress mibashad . wordpress bar asas inke dar che safheie hastim miad yekseri query khodesh ejra mikone
//va lazem nist ma be database dastori bedim . masalan agar dar safhe index.php bashim , ye query mizane ke database yekseri
//etelaatte barmigardone . in etelaat ba maniLoop ghabele dastresi hast va mitonim behesh dastresi dashe bashim . dar //index.php az tarighe mainLoop mitonim be akharin neveshte ha dastresi dashte bashim .

if(have_posts()){
    echo '</ul>';
    while(heve_posts()){
	the_post();     //amade mikone post haro
	echo '<li>';
	the_title();    //title post haro namayesh mide
	echo '</li>';
    echo'</ul>';
}
}else{
echo 'نوشته ای وجود ندارد';
}

//tedade akharin post haee ke ba mainloop na index.php namayesh dade mishe , az tarighe setting wordpress ghabele tanzim
//shodan hast.


//---------------- the_title() --------------

نکته : از این تابع فقط در حلقه وردپرس میتونیم استفاده کنیم .خروجی این تابع مستقیما چاپ میشه و نیازی به اکو کردن نداریم .
in tabe 3 ta parametr migire . the_title($before,$after,$echo)
آخرین آرگومان به صورت بولین هست . یا false هست یا true . اگر false باشه تایتل چاپ نمیشه و اگر true باشه چاپ میشه . اولی هم باهاش مشخص میکنیم که قبل از عنوان چی باشه و با دومی هم تعیین میکنیم بعد از عنوان چی قرار بگیره . مثال زیر :
the_title('<h4 class="title-post">','</h4>',true);

یا مثلا معمولا اینطوری برنامه نویسی کنید که اصلاعات رو بگیرید در یک متغییر بریزید و هر وقت احتیاج داشتید اون متغیر رو چاپ کنید . اونجاست که false‌ استفاده میشه :
$myTitle = the_title('<h4 class="title-post">','</h4>',false);
echo $myTitle;

// ------------- get_the_title -------
این تابع با تابع the-title‌۲ تا تفاوت داره . یکی اینکه این تابع تایتل نوشته رو نمایش نمیده و فقط بر میگردونه . ما میتونیم بریزیمش توی یک متغییر و چاپ کنیم یا هر کاردیگه ای ...

دومین تفاوت اینه که بر خلاف the_title() میتونیم حتی بیرون حلقه وردپرس ازش استفاده کنیم .

این تابع فقط یک آرگومان ورودی میگیره و اونم آي دی هست .
echo get_the_title(34);

از این تابع درون حلقه وردپرس هم میتونید استفاده کنید . کاربردش مثل the_title هست دقیقا . فقط اینکه اگر از ورودی های before & after میخواید استفاده کنید نمیتونید از این تابع استفاده کنید .
اگر بیرون از حلقه وردپرس از get_the_title() بدون آرگومان آی دی استفاده کنید ، آخرین نوشته رو براتون نمایش میده .

//------------- the_permalink(); ------
وقتی از این تابع استفاده کنیم در حلقه وردپرس در صفحه اصلی ، لینک های آخرین نوشته ها رو برامون نمایش میده . کاربرد این تابع بیشتر لینک دادن به آخرین نوشته ها در حلقه ورردپرس است .خروجی این تابع مستقیما چاپ میشه و نیازی به اکو کردن نداریم . از این تابع فقط در حلقه وردپرس میتونیم استفاده کنیم .

<a href="<?php the_permalink(); ?>مشاهده متن کامل</a>
یا زمانی که میخوای تایتل نوشته هامون نیز لینک دار باشن به خود نوشته :

<a herf="<?php the_permalink(); ?>"><?php the_title(); ?></a>

//--------------- post_permalink(); -------

این تابع همون کار the_permalink() رو انجام میده با این تفاوت که خروجی رو چاپ نمیکنه  . اگر ما احتیاج به نمایش و یا استفاده از لینک خروجی داشته باشیم میتونیم از این تابع استفاده کنیم . ولی حسن خوبی که داره میتونیم دز خارج از حلقه وردپرس نیز ازش استفاده کنیم  . این تابع یک آرگومان به اسم ID میگیره . مثال در بیرون از حلقه که یک تک نوشته میخوایم نمایش داده بشه :

<a href="<?php echo post_permalink(34); ?>"><?php echo get_the_title(34); ?></a>


از این تابع در حلقه وردپرس هم میتونید استفاده کنید . که کارش دقیقا مثل تابع the_permalink() هست . یعنی لینک همون نوشته رو برامون بر میگردونه . یادمون باشه که باید با echo استفاده کنیم .
echo post_permalink();


//------------- the_tags(); ------------

با این تابع میتونیم تگ های یک نوشت رو نمایش بدیم . باید از این تابع در حلقه وردپرس استفاده کنیم . این تابع ۳ تا آرگومان ورودی میگیره ;
$before  $seperator  $after
به صورت پیش فرض آرگومان اول در وردپرس انگلیسی tags: هست و در وردپرس فارسی برچسب ها : است
به صورت پیش فرض آرگومان دوم کاما و یا همان ویرگون انگلیسی هست 
پس شما هر قبل و یا بعد و یا جدا کننده ای میتونید به جای این پیش فرض ها بزارید .

<?php post-tags('<p class="post-tags">کلمات کلیدی :','-','</p>');

//------------- the_content(); ---------
از این تابع برای نمایش متن کامل نوشته ها استفاده می شود . این تابع یک آرگومان میگیره . با این آرگومان میتونیم بگیم که اگر مدیر در ویرایشگر از more استفاده کرد ، برای ادامه مطلب چه چیزی نمایش داده شود . پیش فرض (...) می باشد .
مثال :
<?php the_content([ادامه مطلب]); ?>

//------------- get_the_content(); ----------
این تابع مثل the_content عمل میکنه ولی با ۲ تفاوت :

تفاوت اول : مطلب نوشته رو چاپ نمیکنه و فقط بر میگردونه . باید ما اون رو echo کنیم تا نمایش داده بشه .

تفاوت دوم : این تابع شورت کدهای تو نوشته یا ویدیوها رو نمایش نمیده . برای نمایش ویدیو باید از یکسری فیلتر استفاده کنیم .
//--------------- the_excerpt(); -------
این تابع ۵۵ کلمه اول نوشته ما رو میگیره و نمایش میده و بعد اون (...) میزاره .
این تابع هر افکتی که نوشته مون در اون ۵۵ کلمه اول داشته باشه رو حذف میکنه و نمایش نمیده . مثلا اگر لینکی یا رنگی یا بولد شدنی به نوشته داده باشیم دیگه نمایش داده نمیشه و ساده میشه .


//-------------   get_the_excerpt();
این تابع مثل the_excerpt() کار میکنه با ۲ تفاوت :
تفاوت یک : چیزی نمایش نمیده این تابع و فقط خلاصه مطلب رو برمیگردونه . برای نمایش اون باید از دستور echo استفاده کنیم .
تفاوت دو : اگر Incpect Element بگیریم میبینیم که تابع the_excerpt خلاصه رو در داخل تگ <p> قرار میده ولی تابع get_the_excerpt این کار رو نمیکنه و هیچ تگی نداره خلاصه مطلب

//--------------  wp_trim_excerpt(); -------
دقیقا مثل get_the_excerpt میباشد با این تفاوت که یک آرگومان میگیره :

هرچی بهش به عنوان ورودی بدیم ، همون رو به عنوان خلاصه تمام نوشته ها در نظر میگیره :
<?php 
$txt = 'خلاصه این نوشته  می باشد .';
wp_trim_excerpt($txt); ?>

//------------- the_category($separator,$parents,$post_id); ----------

این تابع دسته بندی های هر نوشته رو نشون میده . ۳ آرگومان ورودی هم میگیره . به صورت پیش فرض زیر نوشته یک <ul> ایجاد میکنه با کلاس post-categories و داخلش به تعداد دسته ها <li> وجود دارد و داخل هر کدوم تگ <a rel=category> وجودد داره .

به محض اینکه یک آرگومان برای این تابع تعریف کنیم ( مثلا separator ) ، نمایش لیست وار دسته ها در خروجی از بین خواهد رفت و در کنار هم نوشته میشووند .
برای آرگومان دوم ، یعنی والد ، اگر خالی بزاریم ، به صورت پیش فرض  فقط همون دسته ای که تیک زدیم رو نشون میده (فوتبال ) . مثلا دسته فوتبال .
 اگر بنویسیم 'single' میاد والد دسته فوتبال که ورزشی باشه رو کنارش مینویسه ولی هم چنان به فوتبال لینک هستن (ورزشی،فوتبال) هردو و یک دست هستن . 
 اگر 'multiple' بنویسیم میاد تگ والد یعنی ورزشی رو هم مینویسه ولی هر کدوم به دسته خودشون لینک هستن ( ورزشی ، فوتبال )

آرگومان سوم رو هم اگر در mainloop خالی بزاریم پیش فرض آی دی همون مطلبی هست که نوبت فراخوانیش رسیده .

//------------ the_date($formate,$before,$after,$echo); -----------
نکته : بعد از استفاده از این تابع ، وقتی تاریخ انتشار یک نوشته رو مینویسه و میره نوشته بعدی اگر دقیقا همون تاریخ باشه دیگه نمینویسه . تازمانی که به تاریخ جدید برخورد کنه .
<?php the_date(get_option('date_format'),'<span class="post-date">تاریخ انتشار : ','</span>',true);



//----------------------  the_time($format) ------------------
زمان انتشار مطلب را نمایش میده . اگر بهش فرمت تاریخ بدهید ، تاریخ رو هم نمایش می دهد .

//----------------------  get_the_time($format,$id) ----------
زمان را نمایش نمیدهد و باید از دستورات نمایش استفاده کنیم قبلش . یک آرگومان هم اضافه تر میگیره برای زمانی که به نوشته خاصی بخوایم اشاره کنیم . در mainloop اگر آی دی ندیم خودش مثل تابع قبلی ، آخرین نوشته مد نظرش در اون حلقه خواهد بود .

//------------ get_the_date($format,$post_id) ---------
با استفاده از این تابع مشکل تابع the_date حل میشه . این تابع چاپ نمیشه و فقط مقدار رو برمیگردونه که ما باید اونو چاپ کنیم . آرگومان های اون نیز متفاوت است .

//--------------- the_author() ------------
نام نویسنده مطلب رو نمایش میده این تابع . اگر کاربر نام یا لقب نمایشی برای خودش ست کرده باشه اون نام رو نمایش میده

//--------------  get_the_author()  ----------
این تابع فقط نام نویسنده رو بر میگردونه و باید از دستورات چاپ برای نمایش استفاده کنیم .

//-------------  the_author_link()  & get_the_author_link()  ----------
این تابع اسم نویسنده رو لینک دار چاپ می کنه . به جایی لینک میکنه که کاربر در صفحه کاربریش لینکی رو به عنوان وبلاگ خودش معرفی کرده . این لینک به هر کجا میتونه باشه .

//------------- the_author_posts_link() -----------
این تابع اسم نویسنده رو لینک میکنه به تمام نوشته های اون نویسنده .

//-------------- next_posts_link($lable ,$max_pages) & get_next_posts_link() ------------
به تعداد نوشته هایی که در تنظیمات ست شده که چه تعداد نوشته نمایش داده شود ، نمایش داده میشه و اگر مطالب بیشتر باشند آخر صفحه لینک میاد "برگه بعدی" . در این تابع با آرگومان اولش میتونی این کلمه رو تغییر بدی و با آرگومان دومش میتونی مشخص کنی تا چه صفحه ای نمایش بده نوشته ها رو . به صورت پیش فرض عدد صفر می باشد و تا آخر نوشته ها می رود .

next_posts_link('نوشته های بیشتر','X');

//------------ previous_posts_link($lable ,$max_pages) & get_previous_posts_link() ---
دقیقا مثل تابع قبلی هست برای لینک دادن به صفحه مطالب جدیدتر

//----------  posts_nav_link($sepratar ,$previous_lable ,$next_lable)
این تابع کار ۲ تابع قبلی روباهم انجام میده . "برگه بعدی -- برگه قبلی" رو نمایش میده و سه تا آرگومان میگیره . جداکننده و متن برگه بعدی و متن برگه قبلی .


//------------------ wp_title($separator ,$display ,$seplocation)
تابع نمایش تایتل صفحات می باشد . باید در بین تگ <title>‌استفاده کنید .از این تابع استفاده کنید صفحه اصلی تایتل نمیگیره به خودش .
آرگومان دوم به صورت $true & $false هست که باعث میشه نمایش بده یا نده .
آرگومان سوم دو مقدار left & right میگیره که تعیین میکنه separator در کدوم سمت تایتل قرار بگیره .

wp_title("|" ,true ,'left');
نتیجه به صورت زیر میشه مثلا در صفحه ورزشی : صفحه ورزشی |
برای اینکه خروجی اینطوری تایتل اینطوری باشه: عنوان سایت | ورزشی 
باید شبیه کد زیر بنویسیم:
<?php bloginfo('name'); wp_title("|" ,true ,'letf'); ?>

یا میتونید بلاگ اینفو و تایتل رو جا به جا کنید تا خروجی به شکل زیر بشه : ورزشی | عنوان سایت










<?php//-------------------- archive.php --------- ?>

همانظور که میدونید ۲ صفحه هستند که از بقیه مسئولیت بیشتری دارند . یکی Index و دیگری Archive
زمانی که صفحاتی مثل home - front-page - 404 - search در دسترس نباشند ، صفحه index به جای آنها اجرا خواهد شد . و زمانی هم که صفحاتی مثل date - author - category - tag - taxonomy - archive-pposttype وجود نداشته باشند ، صفحه archive لود می شود . پس این ۲ صفحه مهم هستند .

در اصل میتونیم که بجای اینکه صفحات دیت و کتگوری و ... رو که بسیار شبیه هم هستند رو جدا جدا تعریف کنیم ، میتونیم یک صفحه آشیو درست کنیم و توش از شرط های مختلف استفاده کنیم ، که چک کنه اگر قرار بود آرشیو تگ باشه به یه شکل نمایش داده بشه و اگر قرار بود نوشته های دسته خاصی رو نمایش بده ، فلان شکل باشه و .... 


خب پس بصورت زیر فایل آرشیو رو با شرط های مختلف ایجاد میکنیم تا صفحه های مختلف را ساپورت کند :
title :
<span>
	<?php
		if(is_category()){ ?>
			matalebe daste "<?php single_cat_title() ?>"
		<?php}
		if(is_teg()){ ?>
			mataleb ba barshasbe"<?php single_tag_title() ?>"
		<?php }
		elseif(is_day()){ ?>
			bayegani neveshtehaye "<?php the_time('j,F,Y') ?>"
		<?php }
		elseif(is_month()){ ?>
			bayegani neveshtehaye "<?php the_time('F,Y') ?>"
		<?php }
		elseif(is_year()){ ?>
			bayegani neveshtehaye "<?php the_time('Y') ?>"
		<?php }
		elseif(is_author()){
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
			echo 'bayegani neveshte karbare :'.$curauth->nickname.'"';
		}
		elseif(isset($_GET['paged']) && !empty($_GET['paged'])){
			?>
			baygani matalebe site
			<?php }
			?>
</span>


<?php
//----------------------- widgetize ----------
ابتدا باید قالب خودمون رو رجیستر کنیم که ابزارک ها براش فعال بشه و بعد بریم سراغ طراحی ویجت

//registerin dynamic sidebar

function sb1(){
    register_sidebar(
	array(
	    'name' => 'سایدبار شماره ۱',
    	    'description' => 'محیط استفاده از ابزارک به صورت پویا',
	    'id' => '###',//به صورت پیش فرض ابزارکمون یه آی دی میگیره که میتونیم اونو هرچی خواستیم بزاریم
	    'class' => '###',//عین توضیحات بالا
	    'before_widget' => '<div class='widge'>',//طبق کد html
	    'before_title' => '<h4 class='widge_title'>',
	    'before_title' => '</h4>',
	    'before_widget' => '</div>',
	)
    );
}
add_action('widgets_init','sb1');

//حالا برای اینکه این ابزارک ایجاد شده مثلا در سایدبار نمایش داده بشه باید به سراغ فایل سایدبار بریم .
//هرکجای سایدبار که دوست داشتیم امکان ست شدن ابزارک وجود داشته باشه کد زیر رو مینویسیم:
if(is_active('####')){
	dynamic_sidebar('####');//این آرگومان ورودی میتونه نام ویجت یا آی دی ویجت قرار بگیره
}


//-------- Is_User_Logeed_in ------
// تابعی هست که تعیین میکنه کاربر باید لاگین باشه . حالا میتونیم با استفاده از شرط ها بگیم هر وقت کاربر لاگین بود یکسری چیزها نمایش داده بشه و یا نشه
//این تابع چیزی برنمیگردونه بجز یک مقدار بولین

//مثلا حتما برای نمایش یا عدم نمایش فرم لاگین از تابع استفاده میکنیم .

if(!(is_user_logged_in()){
<div id="login">
##########
</div>
}
//تا اینجا تابع کاری نداره که کاربر ، مدیر هست یا کاربر معممولی هست و یا ...



//-------- Post Count ------------
//معمولا شرط میزارن که اگر کسی لاگین بود ، بازدیدش حساب نشه . مثلا مدیر اگر لاگین کرده و هی داره صفحات مختلف رو میبینه ، شمارش نندازه

سرچ کنید
//---------- query_posts() ------------
//با این دستور کوئری میزنیم به دیتابیس و هرچی میخوایم میکشیم بیرون . آرگومان های ورودی این تابع زیاد هستن .میتونه یک آرایه بگیره
//وقتی ازا این تابع استفاده میکنیم یعنی داریم کنترل رو دست خودمون میگیرم . پس بعد از تمام شدن کارمون باید با دستور زیر کنترل رو به وردپرس برگردونیم 

wp_reset_query();
سرچ کنید برای آرگومان هاش حتما















//------------- </head> ----------?>

<?php echo get_bloginfo( 'name' ); ?>
<?php echo get_bloginfo( 'description' ); ?>
<?php echo get_bloginfo( 'wpurl' );?>
<?php bloginfo('charset'); ?>
<?php bloginfo('template_url'); ?>
<?php bloginfo('stylesheet_directory'); ?>/reset.css
<?php bloginfo('stylesheet_url'); ?>
<?php wp_head();?>

-------------Content -------------
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- contents of the loop --><?php the_excerpt(); ?>
<?php endwhile; endif; ?>


----------Content.php --------
<div class="blog-post">
	<h2 class="blog-post-title"><?php the_title(); ?></h2>
	<p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>

 <?php the_content(); ?>

</div>

-------------- LOOP -----------------

<?php get_header(); ?>
 
        <div class="post">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="post-details">
                    <div class="post-details-left">
                        Posted on <strong><?php the_date(); ?></strong> by <span class="author"><?php the_author(); ?></span> under <span class="author"><?php the_category(', '); ?></span>
                        </div>
                        <div class="post-details-right">
        <?php edit_post_link('Edit', '<span class="comment-count">  ' , '</span>'); ?><span class="comment-count"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></span>
        </div>
                    </div>
                </div>
 
                <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
                        <?php the_excerpt(); ?>
                <?php else : ?>
                        <?php the_content('Read More'); ?>
                <?php endif; ?>
 
                <div class="dots"></div>
            </div><!-- post -->
 
<?php get_footer(); ?>

--------Next And previous Link -------------

<?php next_posts_link( 'Older posts' ); ?>
<?php previous_posts_link( 'Newer posts' ); ?>

<?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_attr( $next_post->post_title ); ?></a>
<?php endif;


$prev_post = get_previous_post();
				if (!empty( $prev_post )): ?>
					<a href="<?php echo $prev_post->guid ?>"><?php echo $prev_post->post_title ?></a>
				<?php endif;

//------------- footer ------
<?php wp_footer(); ?>

//-------------- Single.php -----------

<?php get_header(); ?>
 
<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
        <h1>Not Found</h1>
            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post</p>
<?php endif; ?>
 
<?php while ( have_posts() ) : the_post(); ?>
 
<div class="post">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="post-details">
        <div class="post-details-left">
        Posted on <strong><?php the_date(); ?></strong> by <span class="author"><?php the_author(); ?></span> under <span class="author"><?php the_category(', '); ?></span>
        </div>
        <div class="post-details-right">
        <?php edit_post_link('Edit', '<span class="comment-count">  ' , '</span>'); ?><span class="comment-count"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></span>
        </div>
    </div>
 
    <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
            <?php the_excerpt(); ?>
    <?php else : ?>
            <?php the_content('Read More'); ?>
    <?php endif; ?>
 
    <div class="dots"></div>
</div><!-- post -->
 
<div class="spacer"></div>
 
<?php comments_template( '', true ); ?>
 
<?php endwhile; ?>
 
<div class="spacer"></div>
<?php get_footer(); ?>



--------- Page.php ----------

<?php get_header(); ?>
 
<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
        <h1>Not Found</h1>
            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post</p>
<?php endif; ?>
 
<?php while ( have_posts() ) : the_post(); ?>
 
<div class="post">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
 
    <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
            <?php the_excerpt(); ?>
    <?php else : ?>
            <?php the_content('Read More'); ?>
    <?php endif; ?>
 
    <div class="dots"></div>
</div><!-- post -->
 
<div class="spacer"></div>
 
<?php comments_template( '', true ); ?>
 
<?php endwhile; ?>
 
<div class="spacer"></div>
<?php get_footer(); ?>

<?php
//--------- Menu --------------

function register_my_menus() {
	register_nav_menus(
		array(
			'top-menu' => __( 'فهرست بالا' ),
			'main-menu' => __( 'فهرست اصلی' ),
			'footer-menu' => __( 'فهرست پایین' )
		)
	);
}
add_action( 'init', 'register_my_menus' );




if (has_nav_menu('top-menu')):

wp_nav_menu( array( 'theme_location' => 'top-menu', 'container' =>'', 'menu_class' =>'nav navbar-nav navbar-right','menu_id'=>'navigation' ) );

else:
inja bayad menu balaei ijad konid
endif;


//--------- Erorr 404  ----------------------------

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'twentythirteen' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>



<?php
//--------- Registering a Sidebar widget --------------

function themename_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Secondary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'themename_widgets_init' );


//---------- in sidebar.php

<div id="sidebar-primary" class="sidebar">
	<?php dynamic_sidebar( 'primary' ); ?>
</div>


<?php
//----------Load your Sidebar:
 get_sidebar( 'primary' ); ?>

If sidebar active Display Default Sidebar Else display your Content:
<div id="sidebar-primary" class="sidebar">
    <?php if ( is_active_sidebar( 'primary' ) ) : ?>
        <?php dynamic_sidebar( 'primary' ); ?>
    <?php else : ?>
        <!-- Time to add some widgets! -->
    <?php endif; ?>
</div>


<?php// ----Display Default Widgets :?>
<div id="primary" class="sidebar">
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-primary' ) ) : ?>
        <aside id="search" class="widget widget_search">
           <?php get_search_form(); ?>
        </aside>
        <aside id="archives" class"widget">
            <h1 class="widget-title"><?php _e( 'Archives', 'shape' ); ?></h1>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside id="meta" class="widget">
            <h1 class="widget-title"><?php _e( 'Meta', 'shape' ); ?></h1>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
   <?php endif; ?>
</div>


<?php
//--------------Widget In Wordpress -------------

//------------in html: ?>
 <section class="sideBox">
     <header><h4>title</h4></header>
     content
 </section>

<?php
//----------in phonctions:
if ( function_exists(‘register_sidebar’) ) {
      register_sidebar(array(
            ‘name’ => ‘mysidebar’,
            ‘before_widget’ => ‘<section class=”sideBox”>’,
            ‘after_widget’ => ‘</section>’,
            ‘before_title’ => ‘<header><h4>’,
            ‘after_title’ => ‘</h4></header>’
         ));
}

//---------in sidebar.php:
<?php if ( !function_exists(‘dynamic_sidebar’)  || !dynamic_sidebar(‘mysidebar’) ) : ?>
<?php endif; 




//--------------- Javascript ANd CSS in Functions.php -----------------------

//----CSS :
wp_enqueue_style( $handle, $src, $deps, $ver, $media );


wp_enqueue_style( 'style', get_stylesheet_uri() );
wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css',false,'1.1','all');


//------Scripts:
wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);

wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);

//----------
//Combining Enqueue Functions:
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
 
  wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all');
 
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


//----------- functions.php---------------------
/**
 * MyFirstTheme's functions and definitions
 *
 * @package MyFirstTheme
 * @since MyFirstTheme 1.0
 */
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 800; /* pixels */
 
if ( ! function_exists( 'myfirsttheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function myfirsttheme_setup() {
 
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'myfirsttheme' ),
        'secondary' => __('Secondary Menu', 'myfirsttheme' )
    ) );
 
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
endif; // myfirsttheme_setup
add_action( 'after_setup_theme', 'myfirsttheme_setup' );



//-------------------- Edit Theme language -----------
float: right;
float: left;
text-align: left;
text-align: right;
margin-left: 5px;
margin-right: 5px;
padding-left: 5px;
padding-right: 5px;
margin: 5px 5px 5px 5px;
font-family: yekan;
font-size: 13px;
border-left: solid 1px #000;
border-right: solid 1px #000;


@font-face {
    font-family:  'BYekan';
    src: url('fonts/BYekan.eot?#') format('eot'), /* IE6�8 */
    url('fonts/BYekan.woff') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
     url('fonts/BYekan.ttf') format('truetype');  /* Saf3�5, Chrome4+, FF3.5, Opera 10+ */
}

این فایل mo. را اگر برای قالب باشد٬ باید در پوشه‌ی خود قالب قرار دهید و اگر برای افزونه باشد باید آن را در پوشه‌ی wp-content/plugins قرار دهید.


<div class="post-date">the post date is</div>
convert:
<div class="post-date"><?php _e('the post date is','shakhes'); ?></div>

or :

<div class="post-date"><?php  next_posts_link('« Previous Entries'); ?></div>
convert:
<div class="post-date"><?php  next_posts_link(__('« Previous Entries','shakhes')); ?></div>


//-------- farakhani tarjome dar ghaleb -----

//---in header.php && functions.php ---
<?php load_theme_textdomain('shakhes'); ?>


//-------- farakhani tarjome dar afzoone -----
//---- in file asli plugin
<?php load_plugin_textdomain('shakhes'); ?>

