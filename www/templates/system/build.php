<?php
/**
 * Package		Template
 * Subpackage	System
 * File			build.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-11-10 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Building'); ?></h1>
<?php $this->renderMsgs(); ?>
<div>
	<span class="left" style="margin:0 5px 0 5px; border:1px solid #0a131a;"><img src="<?php echo SKIN; ?>build/b<?php echo $this->getData('build')->id; ?>k10.jpg" alt="" /></span>
	<span><b><?php echo ILang::build($this->getData('build')->id, 'name'); ?></b> - <i><?php echo round($this->getData('build')->points, 1); ?> <?php echo ILang::_('points'); ?></i></span>
</div>
<div>
	<?php if ($this->getData('build')->ress[1]) : ?><span class="left" style="margin-left:10px; width:85px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Titanium'); ?></span><span><?php echo $this->getData('build')->ress[1]; ?></span><br /><?php endif; ?>
	<?php if ($this->getData('build')->ress[2]) : ?><span class="left" style="margin-left:10px; width:85px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Silicon'); ?></span><span><?php echo $this->getData('build')->ress[2]; ?></span><br /><?php endif; ?>
	<?php if ($this->getData('build')->ress[3]) : ?><span class="left" style="margin-left:10px; width:85px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Hydrogen'); ?></span><span><?php echo $this->getData('build')->ress[3]; ?></span><br /><?php endif; ?>
	<span class="left" style="margin-left:10px; width:85px;"><img src="<?php echo SKIN; ?>imgs/2.gif" /><?php echo ILang::_('Time'); ?> :</span><span><?php echo IWBuild::getFormatTime($this->getData('build')->time); ?></span><br />
	<span>&nbsp;</span>
</div>
<hr class="clr" />
<div class="content">
	<i><?php echo qftext($this->getData('build')->desc); ?></i>
</div>
<?php if ($special = $this->getData('build')->special) : ?>
<h1><?php echo ILang::_('Information'); ?></h1>
<div class="block">
	<?php
	$i = 1;
	foreach($special as $key => $info) :
		if ($i > 2)
			$j = 3;
		else
			$j = $j == 2 ? 1 : 2;
		$i++;
	?>
	<div class="bg<?php echo $j; ?>"><span class="left" style="margin: 0 5px; width:70px;"><?php echo ILang::_('Level'); ?> <?php echo $key; ?></span><span><?php echo $info; ?></span></div>
	<? endforeach; ?>
</div>
<? endif; ?>
<? if ($advanced = $this->getData('build')->advanced) : ?>
<h2><?php echo ILang::_('Advanced'); ?></h2>
<div>
	<?php
	$j = 0;
	foreach($advanced as $info) :
		if ($j == 3) break;
		if ($info->level > $this->town->getBuild($this->getData('build')->id))
			$j = 3;
		else
			$j = $j == 2 ? 1 : 2;
	?>
	<div class="bg<?php echo $j; ?>"><span class="left" style="margin: 0 5px; width:70px;"><?php echo ILang::_('Level'); ?> <?php echo $info->level; ?></span><span><?php echo $info->text; ?></span></div>
	<? endforeach; ?>
</div> 
<? endif; ?>