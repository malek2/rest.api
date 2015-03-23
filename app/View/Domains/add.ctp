<?php echo $this->Form->create('Domain'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->submit(__("Ajouté"),array('id'=>'addDomain')); ?>
<?php echo $this->Form->end();?>
<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'); ?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).on('ready',function (){
        $("#addDomain").on('click',function(e){
            e.preventDefault();
            var data = {};
            $.ajax({
            url : '<?php echo $this->Html->url(array('controller'=>'domains','action'=>'add')) ?>',
            type : 'POST',
            data : data,
            success : function(response){
                console.log(response);
            }
        });
        });
    });
<?php $this->Html->scriptEnd(); ?>