<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	    
        <title>Lobby Toronto - <?= $pageTitle; ?></title>
        
        <link href="/r/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/r/lobby/css/lobby.css" rel="stylesheet" media="screen">
        
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="/r/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-fluid">
            <? $this->load->view('elements/menus/main', array('currentPage' => 'reports')); ?>
            <div class="row-fluid">
                <div class="span8">
                    <div class="span10">
                        <?= isset($docContent) ? $docContent : ''; ?>
                    </div>
                    <div class="span2">
                        <?= isset($sidebarContent) ? $sidebarContent : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
