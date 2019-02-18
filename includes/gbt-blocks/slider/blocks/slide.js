( function( blocks, components, editor, i18n, element ) {

	const el = element.createElement;

	/* Blocks */
	const {
		registerBlockType,
	} = wp.blocks;

	const {
		TextControl,
		SelectControl,
		ToggleControl,
		PanelBody,
		Button,
		RangeControl,
		SVG,
		Path,
	} = wp.components;

	const {
		InspectorControls,
		MediaUpload,
		RichText,
		AlignmentToolbar,
		BlockControls,
		PanelColorSettings,
	} = wp.editor;

	/* Register Block */
	registerBlockType( 'getbowtied/bs-slide', {
		title: i18n.__( 'Slide', 'block-shop-extender' ),
		icon:
			el( SVG, { xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 100 100' },
				el( Path, { d:'M85,15H15v60h70V15z M20,70v-9l15-15l9,9L29,70H20z M36,70l19-19l21,19H36z M80,66.8L54.9,44l-7.4,7.4L35,39 L20,54V20h60V66.8z' } ),
				el( Path, { d:'M65,40c4.1,0,7.5-3.4,7.5-7.5S69.1,25,65,25s-7.5,3.4-7.5,7.5S60.9,40,65,40z M65,30c1.4,0,2.5,1.1,2.5,2.5 S66.4,35,65,35s-2.5-1.1-2.5-2.5S63.6,30,65,30z' } ) 
			),
		category: 'block-shop',
		parent: [ 'getbowtied/bs-slider' ],
		attributes: {
		    imgURL: {
	            type: 'string',
	            attribute: 'src',
	            selector: 'img',
	            default: '',
	        },
	        imgID: {
	            type: 'number',
	        },
	        imgAlt: {
	            type: 'string',
	            attribute: 'alt',
	            selector: 'img',
	        },
	        title: {
	        	type: 'string',
	        	default: 'Slide Title',
	        },
	        titleSize: {
	        	type: 'number',
	        	default: 64,
	        },
	        description: {
	        	type: 'string',
	        	default: 'Slide Description'
	        },
	        descriptionSize: {
	        	type: 'number',
	        	default: 16,
	        },
	        textColor: {
	        	type: 'string',
	        	default: '#fff'
	        },
	        buttonText: {
	        	type: 'string',
	        	default: 'Button Text'
	        },
	        slideURL: {
	        	type: 'string',
	        	default: '#'
	        },
	        slideButton: {
	        	type: 'boolean',
	        	default: true
	        },
	        buttonTextColor: {
	        	type: 'string',
	        	default: '#fff'
	        },
	        buttonBgColor: {
	        	type: 'string',
	        	default: '#000'
	        },
	        backgroundColor: {
	        	type: 'string',
	        	default: '#24282e'
	        },
	        alignment: {
	        	type: 'string',
	        	default: 'center'
	        },
	        tabNumber: {
                type: "number"
            }
		},

		edit: function( props ) {

			let attributes = props.attributes;

			function getColors() {

				let colors = [
					{ 
						label: i18n.__( 'Title & Description', 'block-shop-extender' ),
						value: attributes.textColor,
						onChange: function( newColor) {
							props.setAttributes( { textColor: newColor } );
						},
					},
					{ 
						label: i18n.__( 'Slide Background', 'block-shop-extender' ),
						value: attributes.backgroundColor,
						onChange: function( newColor) {
							props.setAttributes( { backgroundColor: newColor } );
						}
					}
				];

				if( attributes.slideButton ) {
					colors.push(
						{ 
							label: i18n.__( 'Button Text', 'block-shop-extender' ),
							value: attributes.buttonTextColor,
							onChange: function( newColor) {
								props.setAttributes( { buttonTextColor: newColor } );
							},
						},
						{ 
							label: i18n.__( 'Button Background', 'block-shop-extender' ),
							value: attributes.buttonBgColor,
							onChange: function( newColor) {
								props.setAttributes( { buttonBgColor: newColor } );
							},
						}
					);
				}

				return colors;
			}

			return [
				el(
					InspectorControls,
					{ 
						key: 'gbt_18_bs_slide_inspector'
					},
					el(
						'div',
						{
							className: 'main-inspector-wrapper',
						},
						el(
							TextControl,
							{
								key: "gbt_18_bs_editor_slide_link",
	              				label: i18n.__( 'Slide Link', 'block-shop-extender' ),
	              				type: 'text',
	              				value: attributes.slideURL,
	              				onChange: function( newText ) {
									props.setAttributes( { slideURL: newText } );
								},
							},
						),
						el( 'hr', {} ),
						el(
							ToggleControl,
							{
								key: "gbt_18_bs_editor_slide_button",
	              				label: i18n.__( 'Slide Button', 'block-shop-extender' ),
	              				checked: attributes.slideButton,
	              				onChange: function() {
									props.setAttributes( { slideButton: ! attributes.slideButton } );
								},
							}
						),
						el( 
							PanelBody, 
							{ 
								key: 'gbt_18_bs_editor_slide_text_settings',
								title: 'Title & Description',
								initialOpen: false,
							},
							el(
								RangeControl,
								{
									key: "gbt_18_bs_editor_slide_title_size",
									value: attributes.titleSize,
									allowReset: false,
									initialPosition: 64,
									min: 10,
									max: 72,
									label: i18n.__( 'Title Font Size', 'block-shop-extender' ),
									onChange: function( newNumber ) {
										props.setAttributes( { titleSize: newNumber } );
									},
								}
							),
							el(
								RangeControl,
								{
									key: "gbt_18_bs_editor_slide_description_size",
									value: attributes.descriptionSize,
									allowReset: false,
									initialPosition: 16,
									min: 10,
									max: 72,
									label: i18n.__( 'Description Font Size', 'block-shop-extender' ),
									onChange: function( newNumber ) {
										props.setAttributes( { descriptionSize: newNumber } );
									},
								}
							),
						),
						el(
							PanelColorSettings,
							{
								key: 'gbt_18_bs_editor_slide_colors',
								initialOpen: false,
								title: i18n.__( 'Colors', 'block-shop-extender' ),
								colorSettings: getColors()
							},
						),
					),
				),
				el( 'div', 
					{ 
						key: 		'gbt_18_bs_editor_slide_wrapper',
						className : 'gbt_18_bs_editor_slide_wrapper'
					},
					el(
						MediaUpload,
						{
							key: 'gbt_18_bs_editor_slide_image',
							allowedTypes: [ 'image' ],
							buttonProps: { className: 'components-button button button-large' },
	              			value: attributes.imgID,
							onSelect: function( img ) {
								props.setAttributes( {
									imgID: img.id,
									imgURL: img.url,
									imgAlt: img.alt,
								} );
							},
	              			render: function( img ) { 
	              				return [
		              				! attributes.imgID && el(
		              					Button, 
		              					{ 
		              						key: 'gbt_18_bs_slide_add_image_button',
		              						className: 'gbt_18_bs_slide_add_image_button button add_image',
		              						onClick: img.open
		              					},
		              					i18n.__( 'Add Image', 'block-shop-extender' )
	              					), 
	              					!! attributes.imgID && el(
	              						Button, 
										{
											key: 'gbt_18_bs_slide_remove_image_button',
											className: 'gbt_18_bs_slide_remove_image_button button remove_image',
											onClick: function() {
												img.close;
												props.setAttributes({
									            	imgID: null,
									            	imgURL: null,
									            	imgAlt: null,
									            });
											}
										},
										i18n.__( 'Remove Image', 'block-shop-extender' )
									), 
	              				];
	              			},
						},
					),
					el(
						BlockControls,
						{ 
							key: 'gbt_18_bs_editor_slide_alignment'
						},
						el(
							AlignmentToolbar, 
							{
								key: 'gbt_18_bs_editor_slide_alignment_control',
								value: attributes.alignment,
								onChange: function( newAlignment ) {
									props.setAttributes( { alignment: newAlignment } );
								}
							} 
						),
					),
					el(
						'div',
						{
							key: 		'gbt_18_bs_editor_slide_wrapper',
							className: 	'gbt_18_bs_editor_slide_wrapper',
							style:
							{
								backgroundColor: attributes.backgroundColor,
								backgroundImage: 'url(' + attributes.imgURL + ')'
							},
						},
						el(
							'div',
							{
								key: 		'gbt_18_bs_editor_slide_content',
								className: 	'gbt_18_bs_editor_slide_content',
							},
							el(
								'div',
								{
									key: 		'gbt_18_bs_editor_slide_container',
									className: 	'gbt_18_bs_editor_slide_container align-' + attributes.alignment,
									style:
									{
										textAlign: attributes.alignment
									}
								},
								el(
									'div',
									{
										key: 		'gbt_18_bs_editor_slide_title',
										className: 	'gbt_18_bs_editor_slide_title',
									},
									el(
										RichText, 
										{
											key: 'gbt_18_bs_editor_slide_title_input',
											style:
											{ 
												color: attributes.textColor,
												fontSize: attributes.titleSize + 'px'
											},
											format: 'string',
											className: 'gbt_18_bs_editor_slide_title_input',
											formattingControls: [],
											tagName: 'h2',
											value: attributes.title,
											placeholder: i18n.__( 'Add Title', 'block-shop-extender' ),
											onChange: function( newTitle) {
												props.setAttributes( { title: newTitle } );
											}
										}
									),
								),
								el(
									'div',
									{
										key: 		'gbt_18_bs_editor_slide_description',
										className: 	'gbt_18_bs_editor_slide_description',
									},
									el(
										RichText, 
										{
											key: 'gbt_18_bs_editor_slide_description_input',
											style:
											{
												color: attributes.textColor,
												fontSize: attributes.descriptionSize + 'px'
											},
											className: 'gbt_18_bs_editor_slide_description_input',
											format: 'string',
											tagName: 'p',
											value: attributes.description,
											formattingControls: [],
											placeholder: i18n.__( 'Add Subtitle', 'block-shop-extender' ),
											onChange: function( newSubtitle) {
												props.setAttributes( { description: newSubtitle } );
											}
										}
									),
								),
								!! attributes.slideButton && el(
									'div',
									{
										key: 		'gbt_18_bs_editor_slide_button',
										className: 	'gbt_18_bs_editor_slide_button',
									},
									el(
										RichText, 
										{
											key: 'gbt_18_bs_editor_slide_button_input',
											style:
											{
												color: attributes.buttonTextColor,
												backgroundColor: attributes.buttonBgColor,
											},
											className: 'gbt_18_bs_editor_slide_button_input',
											format: 'string',
											tagName: 'h5',
											value: attributes.buttonText,
											formattingControls: [],
											placeholder: i18n.__( 'Button Text', 'block-shop-extender' ),
											onChange: function( newText) {
												props.setAttributes( { buttonText: newText } );
											}
										}
									),
								),
							),
						),
					),
				),
			];
		},
		getEditWrapperProps: function( attributes ) {
            return { 
            	'data-tab': attributes.tabNumber 
            };
        },
		save: function( props ) {

			let attributes = props.attributes;

			return el( 'div', 
				{
					key: 		'gbt_18_bs_swiper_slide', 
					className: 	'gbt_18_bs_swiper_slide swiper-slide ' + attributes.alignment,
					style:
					{
						backgroundColor: attributes.backgroundColor,
						backgroundImage: 'url(' + attributes.imgURL + ')',
						color: attributes.textColor
					}
				},
				! attributes.slideButton && attributes.slideURL != '' && el( 'a',
					{
						key: 		'gbt_18_bs_slide_fullslidelink',
						className: 	'fullslidelink',
						href: 		attributes.slideURL
					}
				),
				el( 'div',
					{
						key: 		'gbt_18_bs_slide_content',
						className: 	'gbt_18_bs_slide_content slider-content' //data-swiper-parallax="-1000"
					},
					el( 'div',
						{
							key: 		'gbt_18_bs_slide_content_wrapper',
							className: 	'gbt_18_bs_slide_content_wrapper slider-content-wrapper'
						},
						attributes.title != '' && el( 'h2',
							{
								key: 		'gbt_18_bs_slide_title',
								className: 	'gbt_18_bs_slide_title slide-title',
								style:
								{
									fontSize: attributes.titleSize,
									color: attributes.textColor
								},
								dangerouslySetInnerHTML: { __html: i18n.__( attributes.title, 'block-shop-extender' ) }
							}
						),
						attributes.description != '' && el( 'p',
							{
								key: 		'gbt_18_bs_slide_description',
								className: 	'gbt_18_bs_slide_description slide-description',
								style:
								{
									fontSize: attributes.descriptionSize,
									color: attributes.textColor
								},
								dangerouslySetInnerHTML: { __html: i18n.__( attributes.description, 'block-shop-extender' ) }
							}
						),
						!! attributes.slideButton && attributes.buttonText != '' && el( 'a',
							{
								key: 		'gbt_18_bs_slide_button',
								className: 	'gbt_18_bs_slide_button slide-button',
								href: attributes.slideURL,
								style:
								{
									backgroundColor: attributes.buttonBgColor,
									color: attributes.buttonTextColor
								},
								dangerouslySetInnerHTML: { __html: i18n.__( attributes.buttonText, 'block-shop-extender' ) }
							}
						)
					)
				)
			);
		},
	} );

} )(
	window.wp.blocks,
	window.wp.components,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element
);