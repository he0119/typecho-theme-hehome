<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
} ?>
<!DOCTYPE HTML>
<html lang="zh-cmn-Hans" class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($this->password): ?>
        <meta name="robots" content="noindex">
    <?php endif; ?>
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>

    <!-- Icon https://realfavicongenerator.net/ 自动生成 -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129303434-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129303434-1');
    </script>

</head>
<body>

<header id="header" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="site-name col-mb-12 col-9">
            <?php if ($this->options->logoUrl): ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                </a>
            <?php else: ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        	    <p class="description"><?php $this->options->description() ?></p>
            <?php endif; ?>
            </div>
            <div class="site-search col-3 kit-hidden-tb">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                    <button type="submit" class="submit"><?php _e('搜索'); ?></button>
                </form>
            </div>
            <div class="col-mb-12">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a <?php if ($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>" title="首页"><?php _e('首页'); ?></a>

                    <?php Typecho_Widget::widget('Widget_Users_Admin')->to($users); ?>
                    <?php while($users->next()): ?>
                    <a <?php if ($this->is('archive', $users->uid)): ?> class="current"<?php endif; ?> href="<?php $users->permalink(); ?>" title="<?php $users->screenName(); ?>"><?php $users->screenName(); ?></a>
                    <?php endwhile; ?>

                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while ($pages->next()): ?>
                    <a <?php if ($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </nav>
            </div>
        </div><!-- end .row -->
    </div>
</header><!-- end #header -->
<div id="body">
    <div class="container">
        <div class="row">



