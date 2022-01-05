<?php
//閉じタグの(? >)は不要。テーマ独自にさせたい処理が無い場合はこれでOKです。




function init_func() {
  add_theme_support('title-tag');//titleを取得
  add_theme_support('post-thumbnails');//アイキャッチ画像
}

add_action('init','init_func');
