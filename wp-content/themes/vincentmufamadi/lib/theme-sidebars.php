<?php

if ( !function_exists('register_sidebar') )
    return;

register_sidebar(array(
    'name' => 'Blog Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '<div class="clearfix"></div></div>',
    'before_title' => '<h6>',
    'after_title' => '</h6><div class="sidebar-seperator"></div>',
));

register_sidebar(array(
    'name' => 'Page Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
	'before_title' => '<h6>',
    'after_title' => '</h6><div class="sidebar-seperator"></div>',
	
));

//Custom Sidebars
if(opt('custom_sidebars') != '')
{
    $sidebars = explode(',', opt('custom_sidebars'));
    $i=0;

    foreach($sidebars as $bar)
    {
        register_sidebar(array(
            'id'   => "custom-$i",
            'name' => str_replace('%666', ',', $bar),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        $i++;
    }
}