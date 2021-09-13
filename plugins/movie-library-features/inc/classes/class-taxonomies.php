<?php
/**
 * To load all classes that register taxonomy.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use \Movie_Library\Features\Inc\Traits\Singleton;
use \Movie_Library\Features\Inc\Taxonomies\Taxonomy_Genre;
use \Movie_Library\Features\Inc\Taxonomies\Taxonomy_Label;
use \Movie_Library\Features\Inc\Taxonomies\Taxonomy_Language;
use \Movie_Library\Features\Inc\Taxonomies\Taxonomy_MovieTags;
use \Movie_Library\Features\Inc\Taxonomies\Taxonomy_Person;
use \Movie_Library\Features\Inc\Taxonomies\Taxonomy_ProductionCompanies;
use \Movie_Library\Features\Inc\Taxonomies\Taxonomy_Career;

/**
 * Class Taxonomies
 */
class Taxonomies {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all taxonomies classes.
		Taxonomy_Genre::get_instance();
		Taxonomy_Label::get_instance();
		Taxonomy_Language::get_instance();
		Taxonomy_ProductionCompanies::get_instance();
		Taxonomy_Person::get_instance();
		Taxonomy_MovieTags::get_instance();
		Taxonomy_Career::get_instance();

	}

}
