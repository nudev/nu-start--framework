import metadata from './block.json';
import edit from './edit';
import save from './save';
import {Icon, globe} from "@wordpress/icons";

const { name } = metadata;


const settings = {
	...metadata,
	icon: globe,
	edit,
	save
}

export { name, settings };