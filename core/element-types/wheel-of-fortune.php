<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

final class Torro_Forms_Wheel_Of_Fortune_Element_Type_Date extends Torro_Element_Type {
  /**
   * Initializing.
   *
   * @since 1.0.0
   */
  protected function init() {
    $this->name = 'wheel-of-fortune';
    $this->title = __( 'Wheel of fortune', 'torro-forms-wheel-of-fortune' );
    $this->description = __( 'Adds a wheel of fortune', 'torro-forms-wheel-of-fortune' );
    $this->icon_url = torro()->get_asset_url( 'calendar-icon', 'png' );

    $this->answer_array = false;
    $this->input_answers = true;
  }

  public function to_json( $element ) {
    $data = parent::to_json( $element );

    $data['pointer_image'] = torro()->extensions()->get_registered( 'torro_forms_wheel_of_fortune' )->get_asset_url( 'arrows', 'png');
    $data['input_id'] = $this->get_input_id( $element );
    $data['winning_text'] = $this->settings['winning_text'];

    return $data;
  }

  protected function settings_fields() {
    $this->settings_fields = array(
        'description' => array(
            'title'     => __( 'Description', 'torro-forms' ),
            'type'      => 'textarea',
            'description' => __( 'The description will be shown after the element.', 'torro-forms' ),
            'default'   => ''
        ),
        'winning_text' => array(
            'title'     => __( 'Winning Text', 'torro-forms-wheel-of-fortune' ),
            'type'      => 'textarea',
            'description' => __( 'The text will be shown after the wheel value has been set.', 'torro-forms' ),
            'default'   => ''
        ),
    );
  }

  public function validate( $input, $element ) {
    return $input;
  }
}

torro()->element_types()->register( 'Torro_Forms_Wheel_Of_Fortune_Element_Type_Date' );
