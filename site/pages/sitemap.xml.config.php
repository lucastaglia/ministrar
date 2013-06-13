<?
header("Content-type: text/xml");
?>
<?= '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<!-- XML gerado pelo Nova Brazil CMS - www.novabrazil.art.br -->

<? #HOME ?>
<url>
  <loc>http://www.novabrazil.art.br/home</loc>
  <lastmod><?= date('Y-m-d'); ?>T02:37:54+00:00</lastmod>
  <changefreq>weekly</changefreq>
</url>

<? #FRAGMENTOS ?>
<url>
  <loc>http://www.novabrazil.art.br/home#quem-somos</loc>
  <lastmod><?= date('Y-m-d'); ?>T02:37:54+00:00</lastmod>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>http://www.novabrazil.art.br/home#o-que-fazemos</loc>
  <lastmod><?= date('Y-m-d'); ?>T02:37:54+00:00</lastmod>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>http://www.novabrazil.art.br/home#quem-ja-fez</loc>
  <lastmod><?= date('Y-m-d'); ?>T02:37:54+00:00</lastmod>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>http://www.novabrazil.art.br/home#contato</loc>
  <lastmod><?= date('Y-m-d'); ?>T02:37:54+00:00</lastmod>
  <changefreq>weekly</changefreq>
</url>

<?
$sql  = 'SELECT * FROM cusServicos';
$sql .= " WHERE Publicado = 'Y'";
$sql .= ' ORDER BY Ordem ASC';
$servicos = $db->LoadObjects($sql);

foreach ($servicos as $servico) {
  
  if(!empty($servico->PaginaTexto)){
    
    $data = new nbrDate($servico->LastUpdate, ENUM_DATE_FORMAT::YYYY_MM_DD_HH_II_SS);
?>
<url>
  <loc><?= $router->GetLink('servico/' . utf8_encode($servico->Link)); ?></loc>
  <lastmod><?= $data->GetDate('Y-m-d'); ?>T02:37:54+00:00</lastmod>
  <changefreq>weekly</changefreq>
</url>
<?
  }
}
?>
</urlset>