<ul>
    <?php foreach($vehicles as $item): ?>
        <li><a href="/vehicles/detail/<?=$item->id?>" title="<?=$item->tagline?>"><?=$item->tagline?></a></li>
    <?php endforeach; ?>
</ul>