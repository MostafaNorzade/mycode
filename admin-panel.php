<?php
//========================================
//----------- Functions.php --------------
//========================================


/* ----------------------------------------------------------
All categories
------------------------------------------------------------- */
$themename = "قالب من";
$shortname = "shortname";

$categories = get_categories('hide_empty=0&orderby=name');
$all_cats = array();
foreach ($categories as $category_item ) {
    $all_cats[$category_item->cat_ID] = $category_item->cat_name;
}
array_unshift($all_cats, "انتخاب دسته بندی");


/*---------------------------------------------------
create setting and enque style&scripts
----------------------------------------------------*/
function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
    wp_enqueue_style("panel_style", get_template_directory_uri()."/panel.css", false, "1.0", "all");
    wp_enqueue_script("panel_script", get_template_directory_uri()."/panel_script.js", false, "1.0");
}

/*---------------------------------------------------
Add setting to menu
----------------------------------------------------*/
function add_settings_page() {
add_menu_page( __( 'تنظیمات' . 'mycode' ), __( 'تنظیمات' . 'mycode' ), 'manage_options', 'settings', 'theme_settings_page');
}

add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );





/* ---------------------------------------------------------
settings array
----------------------------------------------------------- */

$theme_options = array (

    array( "name" =>" تنظیمات" . $themename,
        "type" => "title"),

    /* ---------------------------------------------------------
    General Sections
    ----------------------------------------------------------- */
    array( "name" => "عمومی","type" => "section"),
    array( "type" => "open"),
    array( "name" => "لوگو سایت",
        "desc" => "عکس لوگو را وارد کنید",
        "id" => $shortname."_logo",
        "type" => "text",
        "std" => ""),
    array( "name" => "آیکن سایت",
        "desc" => "آیکن سایت باید در اندازه 16*16 باشد ",
        "id" => $shortname."_favicon",    "type" => "text",
        "std" => get_bloginfo('url') ."/images/favicon.ico"),
    array( "type" => "close"),

/* ---------------------------------------------------------
Main Page Section
----------------------------------------------------------- */
    array( "name" => "صفحه نخست",
        "type" => "section"),
    array( "type" => "open"),

    array( "name" => "مطالب ویژه صفحه نخست",
        "desc" => "دسته مطالب ویژه را انتخاب کنید",
        "id" => $shortname."_feat_cat",
        "type" => "select",
        "options" => $all_cats,
        "std" => "انتخاب دسته"),

    array( "type" => "close"),

/* ---------------------------------------------------------
Footer Section
----------------------------------------------------------- */
    array( "name" => "فوتر",
        "type" => "section"),
    array( "type" => "open"),

    array( "name" => "متن کپی رایت فوتر",
        "desc" => "متن کپی رایت را وارد کنید",
        "id" => $shortname."_footer_text",
        "type" => "textarea",
        "std" => ""),

    array( "type" => "close")

);







/*---------------------------------------------------
settings page
----------------------------------------------------*/
function theme_settings_page() {
    global $themename,$theme_options;
    $i=0;
    $message='';
    if ( 'save' == $_REQUEST['action'] ) {

        foreach ($theme_options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

        foreach ($theme_options as $value) {
            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
        $message='saved';
    }
    else if( 'reset' == $_REQUEST['action'] ) {

        foreach ($theme_options as $value) {
            delete_option( $value['id'] ); }
        $message='reset';
    }

    ?>
    <div class="wrap options_wrap">
    <div id="icon-options-general"></div>
    <h2><?php _e( ' تنظیمات قالب' ) //your admin panel title ?></h2>
    <?php
    if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
        <p>تنظیمات قالب '.$themename.' ذخیره شد.</strong></p></div>';
    if ( $message=='reset' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
        <p>'.$themename.' settings reset.</strong></p></div>';
    ?>
    <ul>

        <li>نسخه قالب : 1.0 </li>
    </ul>
    <div class="content_options">
    <form method="post">

    <?php foreach ($theme_options as $value) {

        switch ( $value['type'] ) {

            case "open": ?>
                <?php break;

            case "close": ?>
                </div>
                </div><br />
                <?php break;

            case "title": ?>
                <div class="message">
                    <p>از این پنل برای تنظیم سایت استفاده کنید</p>
                </div>
                <?php break;

            case 'text': ?>
                <div class="option_input option_text">
                    <label for="<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?></label>
                    <input id="" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                </div>
                <?php break;

            case 'textarea': ?>
                <div class="option_input option_textarea">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <textarea name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                </div>
                <?php break;

            case 'select': ?>
                <div class="option_input option_select">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                        <?php foreach ($value['options'] as $option) { ?>
                            <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
                        <?php } ?>
                    </select>
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                </div>
                <?php break;

            case "checkbox": ?>
                <div class="option_input option_checkbox">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
                    <input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                </div>
                <?php break;

            case "section":
                $i++; ?>
                <div class="input_section">
                <div class="input_title">

                    <h3><img src="<?php echo get_template_directory_uri();?>/images/options.png" alt="">&nbsp;<?php echo $value['name']; ?></h3>
                    <span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="ذخیره" /></span>
                    <div class="clearfix"></div>
                </div>
                <div class="all_options">
                <?php break;

        }
    }?>
    <input type="hidden" name="action" value="save" />
    </form>
    <form method="post">
        <p class="submit">
            <input name="reset" type="submit" value="بازنشانی تنظیمات" />
            <input type="hidden" name="action" value="reset" />
        </p>
    </form>
    </div>
    <div class="footer-credit">
        <p>این پنل توسط  <a title="مدرسه وردپرس" href="" target="_blank" >مدرسه وردپرس</a> ساخته شده است.</p>
    </div>
    </div>
    <?php
}

//=====================================================================
//-------------------- Panel.css (function.php directory) -------------
//=====================================================================
?>
<style>
.input_section{
    border:1px solid #ddd;
border-bottom:0;
background:#f9f9f9;
border-radius: 3px 3px 3px 3px;
}
.option_input label{
    font-size:12px;
font-weight:700;
width:15%;
display:block;
float:left;
}
.option_input {
    padding:30px 10px;
border-bottom:1px solid #ddd;
border-top:1px solid #fff;
}
.option_input small{
    display:block;
    float:right;
    width:60%;
    color:#999;
}
.option_input input[type="text"], .option_input select{
    width:20%;
    font-size:12px;
padding:4px;
color:#333;
line-height:1em;
background:#f3f3f3;
}
.option_input input:focus, .option_input textarea:focus{
    background:#fff;
}
.option_input textarea{
    width:20%;
    height:175px;
font-size:12px;
padding:4px;
color:#333;
line-height:1.5em;
background:#f3f3f3;
}
.input_title h3 {
    color: #464646;
    cursor: pointer;
    float: right;
    font-size: 14px;
margin: 0;
padding: 5px 0 0;
text-shadow: 0 1px 0 #FFFFFF;
font-family:tahoma;

}
.input_title{
    cursor:pointer;
    border-bottom:1px solid #ddd;
margin: 0;
padding: 7px 10px;
background-color: #F1F1F1;
background-image: -moz-linear-gradient(center top , #F9F9F9, #ECECEC);
font-size: 15px;
font-weight: normal;
line-height: 1;
border-bottom-color: #DFDFDF;
box-shadow: 0 1px 0 #FFFFFF;
}
.input_title h3 img {
    position: relative;
    top: -2px;
vertical-align: middle;
margin-right: 5px;
}

.input_title span.submit{
    display: block;
    float: left;
    margin: 0 20px;
padding: 0;
}
.clearfix{
    clear:both;
}

form > p.submit {
    float: right;
    padding: 0;
    margin-right: 30px;
}
.options_wrap > ul li {
    display: inline;
    margin-right: 5px;
}
.content_options .message {
    margin-top: 30px
}
.footer-credit{
    margin-top: 60px
}

<?php
//======================================================================
//----------------------- Panel-script.js (functions.php directory) ----
//======================================================================
?>
jQuery(document).ready(function()){
jQuery('.all_options').slideUp();

jQuery('.input_title h3').click(function(){
if(jQuery(this).parent().next('.all_options').css('display')=='none')
{    jQuery(this).removeClass('inactive');
jQuery(this).addClass('active');
jQuery(this).children('img').removeClass('inactive');
jQuery(this).children('img').addClass('active');

}
else
{    jQuery(this).removeClass('active');
jQuery(this).addClass('inactive');
jQuery(this).children('img').removeClass('active');
jQuery(this).children('img').addClass('inactive');
}

jQuery(this).parent().next('.all_options').slideToggle('slow');
});
});


<?php//=================================================
    echo get_option('footer_text');