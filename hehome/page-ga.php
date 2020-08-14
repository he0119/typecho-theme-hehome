<?php
/**
 * Google Analytics
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div class="post-content" itemprop="articleBody">
            <p id="preventGaStatus">当前状态：</p>
            <button id="clearPreventGa">跟踪</button>
            <button id="addPreventGa">不跟踪</button>
            <?php $this->content(); ?>
        </div>
    </article>
    <?php if($this->user->hasLogin()): ?>
        <?php $this->need('comments.php'); ?>
    <?php endif; ?>
</div><!-- end #main-->

<script type="text/javascript">
  var check_cookie = document.cookie.match(/^(.*;)?\s*prevent_ga\s*=\s*[^;]+(.*)?$/);
  if (check_cookie) {
    document.getElementById("preventGaStatus").innerHTML += '不跟踪';
  } else {
    document.getElementById("preventGaStatus").innerHTML += '跟踪';
  }

  document.getElementById("addPreventGa").addEventListener("click", addPreventGa, false);
  function addPreventGa() {
    document.cookie = 'prevent_ga=1;expires=' + new Date(2147483647 * 1000).toUTCString();
    alert('设置完成，不跟踪该设备。');
    console.log('不跟踪');
  }
  document.getElementById("clearPreventGa").addEventListener("click", clearPreventGa, false);
  function clearPreventGa() {
    var date = new Date();
    date.setTime(date.getTime() + (-1 * 24 * 60 * 60 * 1000));
    document.cookie = 'prevent_ga=1;expires=' + date.toUTCString();
    alert('设置完成，正在跟踪该设备。');
    console.log('跟踪');
  }
</script>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
