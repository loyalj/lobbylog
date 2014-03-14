<?php
    $pages = array(
        'reports'   => array('href' => '/reports', 'title' => 'Reports'),
        'lobbyists' => array('href' => '/lobbyists', 'title' => 'Lobbyists')
    );
?>
<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="/">Lobby Toronto</a>
        <ul class="nav navbar-nav">
            <?php foreach($pages as $pageName => $page) { ?>
                <li <?= ($pageName == $currentPage) ? 'class="active"' : ''; ?>><a href="<?= $page['href']; ?>"><?= $page['title']; ?></a></li>
            
            <? } ?>
        </ul>
    </div>
</div>