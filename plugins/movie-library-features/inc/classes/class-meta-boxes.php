<?php
/**
 * To load all classes that register meta box.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use Movie_Library\Features\Inc\Traits\Singleton;
use Movie_Library\Features\Inc\Meta_Boxes\Metabox_MovieInformation;
use Movie_Library\Features\Inc\Meta_Boxes\Metabox_PersonInformation;
use Movie_Library\Features\Inc\Meta_Boxes\Metabox_Image_Gallery;
use Movie_Library\Features\Inc\Meta_Boxes\Metabox_Video_Gallery;
use Movie_Library\Features\Inc\Meta_Boxes\Metabox_Example_2;



/**
 * Class Meta_Boxes
 */
class Meta_Boxes {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all meta boxes classes.
		Metabox_MovieInformation::get_instance();
		Metabox_PersonInformation::get_instance();
		Metabox_Image_Gallery::get_instance();
		Metabox_Video_Gallery::get_instance();
		Metabox_Example_2::get_instance();

	}

}
