<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カタリバ 長崎県雲仙市愛野町</title>
    <meta name="description" content="サイトの概要文">

    <!-- reset.css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

    <!-- drawer.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css" media="screen and (max-width:767px)">
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><!-- 最新バージョン3.5.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
    <!-- drawer.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
    <!-- wow -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">

    <!-- original -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

    <!-- jquery.inview.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"></script>

    <?php wp_head(); ?>

</head>
<body class="drawer drawer--left">

    <div class="title">
        <h1>山のぼりにっき</h1>
    </div>

    <div class="content inner">
        
        <div class="sidebar">
            <div class="sidebar-inner">
                
                <button type="button" class="drawer-toggle drawer-hamburger">
                  <span class="sr-only">toggle navigation</span>
                  <span class="drawer-hamburger-icon"></span>
                </button>

                <nav class="drawer-nav sidebar-nav">
                  <div class="sidebar-logo"><a href="<?php echo home_url(); ?>"><img class="profile-img" src="<?php echo get_template_directory_uri(); ?>/img/profile.JPG" alt="プロフィール画像"></a></div>
                  <ul class="drawer-menu sidebar-nav-list">
                    <li class="sidebar-nav-item">
                        <a class="sidebar-nav-item-link" href="http://localhost:10018/profile/">自己紹介</a>
                    </li>
                    <!-- <li class="sidebar-nav-item">
                        <a class="sidebar-nav-item-link" href="#feature">足ツボの紹介</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="sidebar-nav-item-link" href="#products">カタリバ農園のこと</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="sidebar-nav-item-link" href="#news">山登りブログ</a> -->
                    </li>
                  </ul>

                  <ul class="footer-sns-list">
                    <!-- <li class="footer-sns-item">
                        <a href="" class="footer-sns-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    </li> -->
                    <li class="footer-sns-item">
                        <a href="https://instagram.com/aino_katariba?utm_medium=copy_link" class="footer-sns-link" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                    </li>
                    <!-- <li class="footer-sns-item">
                        <a href="" class="footer-sns-link" aria-label="line"><i class="fab fa-line"></i></a>
                    </li> -->
                  </ul>

                  <div class="categories">
                    <div class="category">

                        <h3 class="category-title">カテゴリー</h3>

                        <?php
                            // 親カテゴリーのものだけを一覧で取得
                            $args = array(
                                'parent' => 0,
                                'orderby' => 'term_order',
                                'order' => 'ASC'
                            );
                            $categories = get_categories( $args );//カテゴリー一覧を取得
                        ?>

                        <ul class="category-list">
                            
                            <?php foreach( $categories as $category ) : ?>
                                <li class="category-list-item">
                                    <a class="category-list-item-text" href="<?php echo get_category_link( $category->term_id );//カテゴリーへのリンクの取得?>">
                                        <?php echo $category->name; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
    
                    <div class="new-entry">


                        <?php
                            $new = get_posts( array( //get_posts()」の中に出力する条件を設定
                            'post_type' => 'post',
                            'posts_per_page' => '5' //投稿された記事を5件だけ出力する
                            ));
                            if( $new ): 
                        ?>
    
                        <h3 class="new-entry-title">最近の記事</h3>

                        <ul class="new-entry-list">

                            <?php foreach($new as $post):setup_postdata($post); ?>
                                <li class="new-entry-list-item">
                                    <a class="new-entry-list-item-text" href="<?php the_permalink(); ?>">
                                        <?php
                                            if(mb_strlen($post->post_title, 'UTF-8')>8){

                                            $title= mb_substr($post->post_title, 0, 8, 'UTF-8');
                                            echo $title.'...';

                                            }else{

                                            echo $post->post_title;
                                            }
                                        ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>

                            <?php wp_reset_postdata();endif; ?>

                    </div>

                  </div>

                  
                  
                </nav>
            </div>
        </div>
        <!-- /.sidebar -->

        <div class="main">
    
            <div class="profile fadeInUpTriggerOnce">

                <?php the_post(); ?> <!-- 記事を読み込む -->

                    <a href="<?php the_permalink(); ?>">

                        <h2 class="profile-title">
                            <?php the_title(); ?><!-- 投稿記事のタイトルを読み込む -->
                        </h2>
                        
                        <div class="profile-content">
                            <?php the_content(); ?><!-- 記事本文-->
                        </div>

                    </a>

            </div>
        </div>
        <!-- /.main -->


    </div>

    
    <footer class="footer">

        <ul class="footer-sns-list">
            <!-- <li class="footer-sns-item">
                <a href="" class="footer-sns-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            </li> -->
            <li class="footer-sns-item">
                <a href="" class="footer-sns-link" aria-label="instagram"><i class="fab fa-instagram"></i></a>
            </li>
            <!-- <li class="footer-sns-item">
                <a href="" class="footer-sns-link" aria-label="line"><i class="fab fa-line"></i></a>
            </li> -->
          </ul>

        <!-- <div class="footer-logo"><img src="/img/logo.png" alt="katariba"></div>
        <ul class="footer-nav-list">
            <li class="footer-nav-item"><a href="" class="footer-nav-item-link">プライバシーポリシー</a></li>
            <li class="footer-nav-item"><a href="" class="footer-nav-item-link">特定商取引法に基づく表記</a></li>
        </ul> -->
        <p class="footer-copyright"><small lang="en">yamanobori blog</small></p>
    </footer>
    
    
    <script>
        //drawer
        $(document).ready(function() {
        $('.drawer').drawer();
        });
    </script>

    <?php wp_footer(); ?>

    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
</body>
</html>