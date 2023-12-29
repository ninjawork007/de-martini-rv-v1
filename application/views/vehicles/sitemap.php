<?='<?xml version="1.0" encoding="UTF-8" ?>'?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?=site_url();?></loc>
        <priority>1.0</priority>
    </url>

    <?php foreach($urls as $path): ?>
    <url>
        <loc><?=site_url($path)?></loc>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>
    
    <?php foreach($vehicles as $item): ?>
    <url>
        <loc><?=site_url("/vehicles/detail/" . $item->id)?></loc>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>

</urlset>
