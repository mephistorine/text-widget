<?php

/*
	Plugin Name: Текстовый виджет
	Description: Простой текстовый виджет

	Author: stylesam
	Author URI: http://stylesam.com/
	Version: 1.0
	License: MIT
*/

add_action('widgets_init', function(){
	register_widget('SLSMTextWidget');
});

class SLSMTextWidget extends WP_Widget
{
	/**
	 * SLSMTextWidget constructor.
	 */
	public function __construct()
	{

		/*parent::__construct(
			'slsm_text_widget',
			esc_html__( 'Текстовый виджет'),
			['description' => esc_html__( 'Тектовый виджет, который выводит текст')]
		);*/

		// or

		$args = [
			'name' => esc_html__( 'Текстовый виджет'),
			'description' => esc_html__( 'Тектовый виджет, который выводит текст'),
			'classname' => 'slsm_test'
		];
		parent::__construct('slsm_text_widget', '', $args);
	}

	public function widget( $args, $instance )
	{
		extract( $args );
		extract( $instance );

		echo $before_widget;
			echo $before_title . $title . $after_title;
			echo $text;
		echo $after_widget;

	}

	public function form( $instance )
	{
		extract($instance);

		?>
		<p>
			<label for='<?php echo $this->get_field_id("title"); ?>'>Заголовок: </label>
			<input
			type='text'
			name='<?php echo $this->get_field_name("title"); ?>'
			id='<?php echo $this->get_field_id("title"); ?>'
			value="<?php if( isset( $title ) ) echo esc_attr( $title ) ?>"
			class='widefat'>

			<label for='<?php echo $this->get_field_id("text"); ?>'>Текст: </label>
			<textarea name="<?php echo $this->get_field_name("text"); ?>" id="<?php echo $this->get_field_id("text"); ?>" cols="20" rows="5" class='widefat'><?php if( isset( $text ) ) echo esc_attr( $text ) ?>
			</textarea>
		</p>
		<?php
	}
}