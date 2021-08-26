<?php
/**
 * This is single file plugin which shows the use of the WordPress Background task using the WP_Background_Process class.
 *
 * @package Background Process
 */

/**
 * Plugin Name: Background Process
 * Plugin URI: http://techslides.com/
 * Description: Example Plugin that uses WP Background Processing to queue background tasks
 * Version: 0.1
 * Author URI: http://techslides.com/
 */


// https://codex.wordpress.org/Plugin_API/Action_Reference/plugins_loaded.

add_action( 'plugins_loaded', 'saas_init' );

/**
 * This funtion is used to call when plugins_loaded hook is called.
 */
function saas_init() {

	/**
	 * This is the demo class for the Example process.
	 */
	class WP_Example_Process extends WP_Background_Process {

		/**
		 * This is for the action.
		 *
		 * @var string
		 */
		protected $action = 'example_process';

		/**
		 * Task
		 *
		 * Override this method to perform any actions required on each
		 * queue item. Return the modified item for further processing
		 * in the next pass through. Or, return false to remove the
		 * item from the queue.
		 *
		 * @param mixed $item Queue item to iterate over.
		 *
		 * @return mixed
		 */
		protected function task( $item ) {

			background_process( $item );

			return false;
		}

		/**
		 * Complete
		 *
		 * Override if applicable, but ensure that the below actions are
		 * performed, or, call parent::complete().
		 */
		protected function complete() {
			parent::complete();

			wp_mail( 'hit@gmail.com', 'Completed task', 'Completed bg task' );

			// Show notice to user or perform some other arbitrary task...
		}

	}
	$process_all = new WP_Example_Process();
}



/**
 * This function is used to run the background process.
 *
 * @param string $str - Data came to process.
 * @return void
 */
function background_process( $str ) {
	wp_mail( 'hitkumarbhalodia2000@gmail.com', 'Testing the Background', $str );
}

add_action( 'wp_ajax_admin_test', 'prefix_ajax_admin_test' );
/**
 * This Function is used to create the ajax request for the testing purpose.
 *
 * @return void
 */
function prefix_ajax_admin_test() {

	$data = 'Hii Hit Here';

	$process_all = new WP_Example_Process();
	$process_all->push_to_queue( $data );
	$process_all->save()->dispatch();

	wp_mail( 'hitkumarbhalodia2000@gmail.com', 'Testing the Background ajax', 'This is the Mail from the Background' );

	echo 'success';
	wp_die();
}

/**
 * Hii : jQuery.ajax({type: "POST",url: ajaxurl,data: {'action': 'admin_test','data': 'go pokeman go'},success: function(data) { console.log(data); }});
 */
