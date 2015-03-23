<!DOCTYPE html>
<html ng-app="appNews">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('style');
                echo $this->Html->css('bootstrap.min');
                echo $this->Html->css('pace-theme-mac-osx.tmpl');

		echo $this->fetch('meta');
		echo $this->fetch('css');

                ?>
    
    <style>
        
        .pace{
            
            background-color: black;
        }
        
    </style>
</head>

<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">

			<?php echo $this->element('header');?>
                  


                    <?php echo $this->Session->flash(); ?>
                    
                    <div style="margin-top: 60px;">
                        <ul class="breadcrumb" style="margin-left: 83px;margin-right: 85px;">
                        <li style="font-size: 14px;">
                            <?php
                            echo $this->Html->getCrumbs(' > ', array(
                                'text' => 'Accueil',
                                'url' => array('controller' => 'Clients', 'action' => 'index'),
                                'escape' => false
                            ));
                            ?></li>
                    </ul>  
                        
                        <?php echo $this->fetch('content'); ?>
                        
                    </div>
		</div>
		<div id="footer">
			
			
		</div>
        </div>
        <?php 
        echo $this->Html->script('jquery-1.11.2.min');
        echo $this->Html->script('angular.min');
        echo $this->Html->script('angular-animate.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('pace.min');
        echo $this->fetch('script');
        ?>

	<?php //echo $this->element('sql_dump'); ?>
        
</body>
</html>
