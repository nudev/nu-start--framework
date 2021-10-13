import { globe } from "@wordpress/icons";
import metadata from "./block.json";
import edit from "./edit";
import save from './save';


const { name } = metadata;

const settings = {
	...metadata,
	icon: globe,
	edit,
	save,
};

export { name, settings };