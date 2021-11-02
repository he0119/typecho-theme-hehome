<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    $filterBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'filterBlock',
        array(
            'FilterPosts' => _t('过滤加密文章'),
            'FilterComments' => _t('过滤加密回复'),
            // 'FilterAllComments' => _t('过滤所有回复'),
        ),
        array('FilterPosts', 'FilterComments', 'FilterAllComments'),
        _t('过滤选项')
    );

    $form->addInput($filterBlock->multiMode());

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarBlock',
        array(
            'ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory' => _t('显示分类'),
            'ShowArchive' => _t('显示归档'),
            'ShowOther' => _t('显示其它杂项'),
            'ShowLinks' => _t('显示友情链接')
        ),
        array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther', 'ShowLinks'),
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
}
