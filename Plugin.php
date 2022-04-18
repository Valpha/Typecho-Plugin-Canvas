<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

/**
 * 网页背景粒子特效插件 Canvas_nest plugin for Typecho。原作：<a href="https://github.com/hustcc/canvas-nest.js/blob/master/README-zh.md" target="_blank">Github</a>
 * 
 * @package Canvas 
 * @author Valpha
 * @version 1.0.1
 * @link http://valpha.cn
 */

class Canvas_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->footer = array('Canvas_Plugin','footer');
        return _t('粒子特效插件已经激活！');
    }

    public static function deactivate()
    {
        return _t('插件已被禁用');
    }

    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $color = new Typecho_Widget_Helper_Form_Element_Text('color', null, '128,128,128', _t('线条颜色：'), _t('请输入线条的颜色RGB，格式为 128,128,128 ，默认0,0,0'));
        $form->addInput($color);

        $opacity = new Typecho_Widget_Helper_Form_Element_Text('opacity', null, '0.5', _t('线条透明度：'), _t('请输入线条透明度，默认0.5'));
        $form->addInput($opacity);

        $count = new Typecho_Widget_Helper_Form_Element_Text('count', null, '150', _t('粒子数量：'), _t('请输入粒子数量，默认150'));
        $form->addInput($count);

        $zIndex = new Typecho_Widget_Helper_Form_Element_Text('zIndex', null, '-1', _t('z-index：'), _t('css属性，用于控制所在层的位置，默认-1。（一般无需更改）'));
        $form->addInput($zIndex);

    }

    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
        
    }

    public static function footer()
    {
        $option = Typecho_Widget::widget('Widget_Options')->plugin('Canvas');
        echo "<script type=\"text/javascript\" color=\"$option->color\" opacity=\"$option->opacity\" count=\"$option->count\" zIndex=\"$option->zIndex\" src=\"https://cdn.bootcdn.net/ajax/libs/canvas-nest.js/1.0.1/canvas-nest.js\"></script>\n";
    }
}
