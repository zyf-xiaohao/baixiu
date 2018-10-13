<?php 
$sql = "select value from options where id = 10";
include "./admin/tools/mySql.php";
$arr = excute_select($sql);

$slideList = json_decode($arr[0]['value']);
//var_dump($slideList);

$sql = "select id,feature,title,views,likes from posts where status = 'published' order by views desc limit 5";
$postsList = excute_select($sql);
//var_dump($postsList);

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <div class="header">
      <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
      <?php $sql = "select value from options where id = 9";
      $arr = excute_select($sql);
      //var_dump($arr);
      $menusList = json_decode($arr[0]['value'], true);
      for ($i = 0; $i < count($menusList); $i++) :

      ?>
        <li><a href="detail.php?title=<?php echo $menusList[$i]['title']; ?>"><i class="<?php echo $menusList[$i]['icon']; ?>"></i><?php echo $menusList[$i]['title']; ?></a></li>
        <!-- <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li> -->
      <?php endfor; ?>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>
    <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">

        <?php 
        $sql = "select id,title,feature,views from posts
        where status = 'published'
        order by rand() 
        limit 5";
        $randList = excute_select($sql);
        for ($i = 0; $i < count($randList); $i++) :
        ?>
          <li>
            <a href="detail.php?id=<?php echo $randList[$i]['id'] ?>">
              <p class="title"><?php echo $randList[$i]['title'] ?></p>
              <p class="reading">阅读(<?php echo $randList[$i]['views'] ?>)</p>
              <div class="pic">
                <img src="<?php echo $randList[$i]['feature'] ?>" alt="">
              </div>
            </a>
          </li>
        <?php endfor; ?>
        
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">

        <?php $sql = "select p.id,p.title,p.feature,p.created,u.nickname from posts p
                      inner join users u
                      on p.user_id = u.id
                      where p.status = 'published' 
                      order by created desc limit 5"; 
        $userList = excute_select($sql);
        for ($i = 0; $i < count($userList); $i++) :              
        ?>  
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="<?php echo $userList[$i]['feature'] ?>" alt="">
              </div>
              <div class="txt">
                <p>
                  <span><?php echo $userList[$i]['nickname'] ?></span><?php echo $userList[$i]['created'] ?>说:
                </p>
                <p><?php echo $userList[$i]['title'] ?></p>
              </div>
            </a>
          </li>
        <?php endfor; ?>

        </ul>
      </div>
    </div>
    <div class="content">
      <div class="swipe">
        <ul class="swipe-wrapper">

        <?php for ($i = 0; $i < count($slideList); $i++) : ?>
          <li>
            <a href="<?php echo $slideList[$i]->link ?>">
              <img src="<?php echo $slideList[$i]->image ?>">
              <span><?php echo $slideList[$i]->text ?></span>
            </a>
          </li>
        <?php endfor; ?>
         
        </ul>
        <p class="cursor">

          <?php for ($i = 0; $i < count($slideList); $i++) :
            $active = $i == 0 ? 'active' : '';
          ?>
            <span class="<?php echo $active; ?>"></span>
          <?php endfor; ?>

        </p>
        <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
        <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="panel focus">
        <h3>焦点关注</h3>
        <ul>

        <?php for ($i = 0; $i < count($postsList); $i++) :
          $large = $i == 0 ? 'large' : '';
        ?>   
          <li class="<?php echo $large; ?>">
            <a href="detail.php?id=<?php echo $postsList[$i]['id'] ?>">
              <img src="<?php echo $postsList[$i]['feature'] ?>" alt="">
              <span><?php echo $postsList[$i]['title'] ?></span>
            </a>
          </li>
        <?php endfor; ?>
            
        </ul>
      </div>
      <div class="panel top">
        <h3>一周热门排行</h3>
        <ol>

        <?php for ($i = 0; $i < count($postsList); $i++) : ?>
          <li>
            <i><?php echo $i + 1; ?></i>
            <a href="javascript:;"><?php echo $postsList[$i]['title'] ?></a>
            <a href="javascript:;" class="like">赞(<?php echo $postsList[$i]['likes'] ?>)</a>
            <span>阅读 (<?php echo $postsList[$i]['views'] ?>)</span>
          </li>
        <?php endfor; ?>

        </ol>
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>

        <?php for ($i = 0; $i < count($postsList) - 1; $i++) : ?>
          <li>
            <a href="detail.php?id=<?php echo $postsList[$i]['id'] ?>">
              <img src="<?php echo $postsList[$i]['feature'] ?>" alt="">
              <span><?php echo $postsList[$i]['title'] ?></span>
            </a>
          </li>
        <?php endfor; ?>
        
        </ul>
      </div>
      <div class="panel new">
        <h3>最新发布</h3>
        <?php 
        $sql = "select p.id,p.title,p.feature,p.created,p.content,u.slug,p.likes,p.views from posts p
        inner join users u on p.user_id=u.id
        where p.status = 'published' and p.category_id = 3
        order by p.created desc 
        limit 3";
        $newsList = excute_select($sql);

        for ($i = 0; $i < count($newsList); $i++) :
        ?>
        <div class="entry">
          <div class="head">
            <span class="sort">会生活</span>
            <a href="detail.php?id=<?php echo $newsList[$i]['id'] ?>"><?php echo $newsList[$i]['title'] ?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $newsList[$i]['slug'] ?> 发表于 <?php echo $newsList[$i]['created'] ?></p>
            <p class="brief"><?php echo $newsList[$i]['content'] ?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $newsList[$i]['views'] ?>)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $newsList[$i]['likes'] ?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>会生活</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <?php endfor; ?>
        <!-- <div class="entry">
          <div class="head">
            <span class="sort">会生活</span>
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <span class="sort">会生活</span>
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="assets/vendors/jquery/jquery.js"></script>
  <script src="assets/vendors/swipe/swipe.js"></script>
  <script>
    //
    var swiper = Swipe(document.querySelector('.swipe'), {
      auto: 3000,
      transitionEnd: function (index) {
        // index++;

        $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
      }
    });

    // 上/下一张
    $('.swipe .arrow').on('click', function () {
      var _this = $(this);

      if(_this.is('.prev')) {
        swiper.prev();
      } else if(_this.is('.next')) {
        swiper.next();
      }
    })
  </script>
</body>
</html>
