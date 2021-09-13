<?php
/**
 * Person post - Person Information meta box.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Meta_Boxes;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Person;

/**
 * Class Metabox_Example
 */
class Metabox_PersonInformation extends Base {

	/**
	 * Meta box slug.
	 *
	 * @var string Meta box slug.
	 */
	const SLUG = 'person-information';

	/**
	 * Meta box label.
	 *
	 * @var string Meta box label.
	 */
	const LABEL = 'Basic Person Information';

	/**
	 * Context of meta box.
	 *
	 * @var string Context of meta box.
	 */
	protected $context = 'normal';

	/**
	 * Priority of meta box.
	 *
	 * @var string Priority of meta box.
	 */
	protected $priority = 'high';

	/**
	 * To get field for meta box.
	 *
	 * @param string $post_type Current post type.
	 *
	 * @throws \FM_Developer_Exception Field manager developer exception.
	 *
	 * @return array
	 */
	public function get_fields( $post_type = '' ) {

		return array(
			'person_birth_date'               => new \Fieldmanager_Datepicker(
				array(
					'name'  => 'person_birth_date',
					'label' => __( 'Enter Birth Date : ', 'movie-library-features' ),
				)
			),
			'person_birth_place'              => new \Fieldmanager_TextField(
				array(
					'name'  => 'person_birth_place',
					'label' => __( 'Enter Birth Place : ', 'movie-library-features' ),
				)
			),
			'person_social_profile_facebook'  => new \Fieldmanager_Link(
				array(
					'name'  => 'person_social_profile_facebook',
					'label' => __( 'Enter Facebook url : ', 'movie-library-features' ),
				)
			),
			'person_social_profile_instagram' => new \Fieldmanager_Link(
				array(
					'name'  => 'person_social_profile_instagram',
					'label' => __( 'Enter Instagram url : ', 'movie-library-features' ),
				)
			),
			'person_social_profile_twitter'   => new \Fieldmanager_Link(
				array(
					'name'  => 'person_social_profile_twitter',
					'label' => __( 'Enter Twitter url : ', 'movie-library-features' ),
				)
			),
			'person_social_profile_website'   => new \Fieldmanager_Link(
				array(
					'name'  => 'person_social_profile_website',
					'label' => __( 'Enter Website url : ', 'movie-library-features' ),
				)
			),
		);

	}

	/**
	 * List of post type in which meta box is allowed.
	 *
	 * @return array List of post type.
	 */
	public function get_post_type() {

		return array(
			Post_Type_Person::SLUG,
		);

	}

}
