 /**
  * WordPress dependencies
  */
 import { useInnerBlocksProps, useBlockProps } from '@wordpress/block-editor';
 
 export default function save( { attributes } ) {
 
	 const blockProps = useBlockProps.save( );
	 const innerBlocksProps = useInnerBlocksProps.save( blockProps );
 
	 return <div { ...innerBlocksProps } />;
 }
 