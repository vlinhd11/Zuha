<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $this->Html->charset() . "\n"; ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $title_for_layout; __(' : floManagr'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<?php 
echo $this->Html->meta('icon') . "\r";
echo $this->Html->css('system') . "\r";
echo $this->Html->css('twitter-bootstrap/bootstrap.min') . "\r";
echo $this->Html->css('twitter-bootstrap/bootstrap.custom') . "\r";
//echo $this->Html->script('http://code.jquery.com/jquery-latest.js') . "\r";
echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
echo $this->Html->script('plugins/modernizr-2.6.1-respond-1.1.0.min') . "\r";
echo $this->Html->script('system') . "\r";
echo $this->Html->script('twitter-bootstrap/bootstrap.min') . "\r";
echo $scripts_for_layout;
echo defined('__REPORTS_ANALYTICS') ? $this->Element('analytics', array(), array('plugin' => 'webpages')) : null; ?>
</head>
<body class="<?php echo __('%s %s %s', $this->request->params['controller'], $this->request->params['action'], ($this->Session->read('Auth.User') ? __(' authorized') : __(' restricted'))); ?>" id="<?php echo !empty($this->request->params['pass'][0]) ? strtolower($this->request->params['controller'].'_'.$this->request->params['action'].'_'.$this->request->params['pass'][0]) : strtolower($this->request->params['controller'].'_'.$this->request->params['action']); ?>" lang="<?php echo Configure::read('Config.language'); ?>">
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

	<?php echo $this->Element('twitter-bootstrap/header'); ?> 
	
    <div class="container">
        
        <?php echo $this->Session->flash(); echo $this->Session->flash('auth'); ?>
        
		<?php echo $this->Element('twitter-bootstrap/page_title'); ?>
		
		<?php echo $this->Element('breadcrumbs'); ?>
        
        <?php echo $content_for_layout; ?>
        
        <footer>
        	<hr />
            <?php echo defined('__SYSTEM_SITE_NAME') ? __('<p>&copy; %s %s</p>', __SYSTEM_SITE_NAME, date('Y')) : __('<p>&copy; Company %s</p>', date('Y')); ?>
        </footer>
		
		<?php echo $this->Element('sql_dump');  ?> <?php echo !empty($dbSyncError) ? $dbSyncError : null; ?> 
    </div> <!-- /container -->
</body>
</html>
