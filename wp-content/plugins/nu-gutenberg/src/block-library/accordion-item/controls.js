 import { globe as openIcon } from "@wordpress/icons";
 import { __ } from '@wordpress/i18n';
 import { Component, Fragment } from '@wordpress/element';
 import { BlockControls } from '@wordpress/block-editor';
 import { Toolbar, Icon } from '@wordpress/components';
 
 class Controls extends Component {
	 render() {
		 const {
			 attributes,
			 setAttributes,
		 } = this.props;
 
		 const {
			 open,
		 } = attributes;
 
		 const customControls = [
			 {
				 icon: <Icon icon={ openIcon } />,
				 /* translators: toggle label to display the accordion open */
				 title: __( 'Display as open', 'nublocks' ),
				 onClick: () => setAttributes( { open: ! open } ),
				 isActive: open === true,
			 },
		 ];
 
		 return (
			 <Fragment>
				 <BlockControls>
					 <Toolbar controls={ customControls } />
				 </BlockControls>
			 </Fragment>
		 );
	 }
 }
 
 export default Controls;
 