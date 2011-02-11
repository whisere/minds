<?php
/**
 * Categories input view
 *
 * @package ElggCategories
 *
 * @uses $vars['entity'] The entity being edited or created
 */

if (isset($vars['entity']) && $vars['entity'] instanceof ElggEntity) {
	$selected_categories = $vars['entity']->universal_categories;
}
$categories = elgg_get_site_entity()->categories;
if (empty($categories)) {
	$categories = array();
}
if (empty($selected_categories)) {
	$selected_categories = array();
}

if (!empty($categories)) {
	if (!is_array($categories)) {
		$categories = array($categories);
	}

	?>

<p class="categories">
	<label><?php echo elgg_echo('categories'); ?></label><br />
	<?php
		echo elgg_view('input/checkboxes', array(
			'options' => $categories,
			'value' => $selected_categories,
			'internalname' => 'universal_categories_list'
		));

	?>
	<input type="hidden" name="universal_category_marker" value="on" />
</p>

	<?php

} else {
	echo '<input type="hidden" name="universal_category_marker" value="on" />';
}
