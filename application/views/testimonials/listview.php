<div class="title-box">
    <h1>Testimonials </h1>
</div>
<div id="testimonials">
    <?php if($testimonials): ?>
        <?php foreach($testimonials as $item): ?>
            <blockquote class="testimonial">
                <?=html_entity_decode($item->testimonial)?>
                <cite title="<?=$item->citation?>">
                    <strong>- <?=htmlentities($item->citation)?></strong>
                    &nbsp;&nbsp;&nbsp;
                    <time class="right"><?=date('m/d/Y', strtotime($item->display_date))?></time>
                    <br>
                    <div class="location"><i><?=$item->location?></i></div>
                </cite>
            </blockquote>
        <?php endforeach; ?>
    <?php endif; ?>
    <br>
</div>
<center>
<?=$links?>
<br>
<br>
<a href="http://www.rvdeals.net/testimonials/rvnet.htm" title="RV Discussion's" class="pure-button yellow-button">Testimonials from the Web</a>
</center>
<br>
