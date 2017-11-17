<xml version='1.0' encoding='UTF-8'>
<rss version='2.0'>
	<channel>
		<title>EightRss</title>
		<description>Le flux RSS du site EightRss</description>
		<lastBuildDate><?= date(DATE_RSS, strtotime($lastBuildDate)) ?></lastBuildDate>
		<link></link>
		<?php while ($a = $articles->fetch()) : ?>
		<item>
			<title><?= $a['titre'] ?></title>
			<description><?= substr($a['contenu'],0,300).'...' ?></description>
			<pubDate><?= date(DATE_RSS, strtotime($a['date_time_post'])) ?></pubDate>
			<link>http://www.example.org/article/<?= $a['id'] ?></link>
			<image>
				<url>http://www.example.org/image/<?= $a['id'] ?></url>
				<link>http://www.articleexample.org/article/<?= $a['id'] ?></link>
			</image>
		</item>
		<?php endwhile ?>
	</channel>
</rss>