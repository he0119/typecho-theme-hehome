<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
} ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <!-- 备案信息 -->
    <div class="blog-text-center">
        <a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow noopener">蜀ICP备18034005号-1</a>
        <a href="https://beian.mps.gov.cn/#/query/webSearch?code=51011202000228" target="_blank" rel="nofollow noopener">
            <img src="<?php $this->options->themeUrl('img/beian.png'); ?>" alt="beian" loading="lazy" width="16" height="17"/>
            <span>川公网安备51011202000228号</span>
        </a>
    </div>
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
