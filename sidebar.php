<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php if (!empty($this->options->filterBlock) && in_array('FilterPosts', $this->options->filterBlock)) {
                Filter_Plugin::recentPosts()->to($post);
            } else {
                $this->widget('Widget_Contents_Post_Recent')->to($post);
            }
            ?>
            <?php while($post->next()): ?>
                <li><a href="<?php $post->permalink(); ?>"><?php $post->title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <?php if($this->user->hasLogin()): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php if (!empty($this->options->filterBlock) && in_array('FilterComments', $this->options->filterBlock)) {
            Filter_Plugin::recentComments()->to($comments);
        } else {
            $this->widget('Widget_Comments_Recent')->to($comments);
        }
        ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=year&format=Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php endif; ?>
                <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <?php if($this->user->hasLogin()): ?>
                <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
                <li><a href="http://smart.hehome.xyz">智慧家庭</a></li>
            <?php endif; ?>
        </ul>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowLinks', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('友情链接'); ?></h3>
        <ul class="widget-list">
            <?php Links_Plugin::output();?>
        </ul>
	</section>
    <?php endif; ?>

</div><!-- end #sidebar -->
