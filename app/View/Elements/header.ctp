<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 60px;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller'=>'Clients','action'=>'index')); ?>"><?php echo __('Administration') ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilisateurs <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Clients','action'=>'add')); ?>">
                                Ajouter un utilisateur
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'Clients','action'=>'index')); ?>">
                                Liste des Users
                            </a>
                        </li>
                      
                    </ul>
                </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $this->Html->url= 'http://local.dev/dashboardnews/'; ?>">
                                Se déconnecter <i class="glyphicon glyphicon-off"></i>
                            </a>
                        </li>
                    </ul>
              
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</div>
<div class="cb"></div>