( function( blocks ) {
	var blockCategories = blocks.getCategories();
	blockCategories.unshift({ 'slug': 'block-shop', 'title': 'Block Shop Blocks'});
	blocks.setCategories(blockCategories);
})(
	window.wp.blocks
);