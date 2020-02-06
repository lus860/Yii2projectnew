<div class="breaking-news-area d-flex align-items-center">
    <div class="news-title">
        <p>Breaking News:</p>
    </div>

<div id="breakingNewsTicker" class="ticker">
    <ul>
        <?php foreach ($newlatests as $newlatest):?>
          <li><a href="single-post.html"><?=$newlatest->title;?></a></li>
        <?php endforeach;?>
    </ul>
</div>
</div>