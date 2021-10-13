import metadata from './block.json';
import edit from './edit';
import save from './save';
import variations from "./variations";
import {globe} from "@wordpress/icons";

const { name } = metadata;


const settings = {
	...metadata,
	icon: globe,
	edit,
	save,
	variations,
}

export { name, settings };