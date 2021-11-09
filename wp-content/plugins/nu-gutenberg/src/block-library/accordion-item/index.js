import { globe } from "@wordpress/icons";
import metadata from "./block.json";
import './style.scss';
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