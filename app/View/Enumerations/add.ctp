<?php
echo $this->Form->create('Enumeration');
echo $this->Form->input('Enumeration.id');
echo $this->Form->input('Enumeration.name');
if(count($enumerationTypes)) {
	echo $this->Form->input('Enumeration.type',array('type'=>'select','options'=>array_merge($enumerationTypes,array('+'=>'+ Add new type'))));
}
else {
	echo $this->Form->input('Enumeration.type', array('value' => $type));
}
echo $this->Form->end('Done');

// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Enumerations',
		'items' => array(
			$this->Html->link('List', array('plugin' => null, 'controller' => 'enumerations', 'action' => 'index')), 
			)
		),
	))); ?>

<script type='text/javascript'>
$(document).ready(function() {
	$('select#EnumerationType').change(function() {
		if($(this).val() == '+') {
			$(this).replaceWith('<input name="data[Enumeration][type]" id="EnumerationType" type="text" />')
		}
	});
});
</script>