<?php 

// Button
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Button", 'icos'),
   "base" => "button",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "edit_field_class" => "vc_col-sm-6",
         "heading" => esc_html__("Button Label", 'icos'),
         "param_name" => "btn_text",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "edit_field_class" => "vc_col-sm-6",
         "heading" => esc_html__("Button Link", 'icos'),
         "param_name" => "btn_link",
         "value" => "",
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "edit_field_class" => "vc_col-sm-6",
         "heading" => esc_html__("Size", 'icos'),
         "param_name" => "size",
         "value" => array(                        
                     esc_html__('Normal', 'icos')   => '',
                     esc_html__('Big', 'icos')      => 'btn-md',                  
                     esc_html__('Small', 'icos')    => 'btn-sm',
                  ),
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "edit_field_class" => "vc_col-sm-6",
         "heading" => esc_html__("Style", 'icos'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Rounded', 'icos')   => '',
                     esc_html__('Squared', 'icos')   => 'squared',                  
                  ),
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "edit_field_class" => "vc_col-sm-6",
         "heading" => esc_html__("Color Button", 'icos'),
         "param_name" => "color",
         "value" => "",
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "edit_field_class" => "vc_col-sm-6",
         "heading" => esc_html__("Hover Color Button", 'icos'),
         "param_name" => "hcolor",
         "value" => "",
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "edit_field_class" => "vc_col-sm-6",
         "heading" => esc_html__("Backgound Color", 'icos'),
         "param_name" => "bg_color",
         "value" => "",
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "edit_field_class" => "vc_col-sm-6",
         "heading" => esc_html__("Hover Backgound Color", 'icos'),
         "param_name" => "hbg_color",
         "value" => "",
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Alignment", 'icos'),
         "param_name" => "align",
         "value" => array(                        
                     esc_html__('Inline', 'icos')   => 'inline',
                     esc_html__('Left', 'icos')     => 'text-left',                  
                     esc_html__('Center', 'icos')   => 'text-center',                  
                     esc_html__('Right', 'icos')    => 'text-right',                  
                  ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Extra Class", 'icos'),
         "param_name" => "el_class",
         "value" => "",
         "description" => esc_html__("Add class to custom css.", 'icos'),
      ),   
    )));
}

// Section Heading
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Section Heading", 'icos'),
   "base" => "hsection",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Title', 'icos'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Subtitle', 'icos'),
         "param_name" => "sub",
         "value" => "",
      ),    
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Circle Lines', 'icos'),
         "param_name" => "line",
         "value" => "",
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Style", 'icos'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1: Dark/Light', 'icos')  => 's1',
                     esc_html__('Style 2: Azure', 'icos')       => 's2',               
                     esc_html__('Style 3: Lavender', 'icos')    => 's3',               
                     esc_html__('Style 4: Muscari', 'icos')     => 's5',               
                  ),
      ),
    )
    ));
}

// Socials
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Socials", 'icos'),
   "base" => "isocials",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Socials", 'icos'),
          'value' => '',
          'param_name' => 'social',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  'type' => 'iconpicker',
                  'value' => '',
                  'heading' => 'Social Icon',
                  'param_name' => 'icon',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Social Link',
                  'param_name' => 'link',
               ),
          )
      )   
    )
    ));
}

// Video Popup 
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Video Popup", 'icos'),
   "base" => "vpopup",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Style", 'icos'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1', 'icos')   => 's1',
                     esc_html__('Style 2', 'icos')   => 's2',               
                  ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Link Video', 'icos'),
         "param_name" => "link",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text 1', 'icos'),
         "param_name" => "text1",
         "value" => "",
      ),    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text 2', 'icos'),
         "param_name" => "text2",
         "value" => "",
      ),
    )
    ));
}


// Features Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Features Box", 'icos'),
   "base" => "iconbox",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Image', 'icos'),
         "param_name" => "photo",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Title', 'icos'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Description', 'icos'),
         "param_name" => "content",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Link', 'icos'),
         "param_name" => "link",
         "value" => "",
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Style", 'icos'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1', 'icos')   => 's1',
                     esc_html__('Style 2', 'icos')   => 's2',              
                  ),
      ),
    )
    ));
}


// Icon Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box", 'icos'),
   "base" => "iconbox2",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Icon', 'icos'),
         "param_name" => "icon",
         "value" => "",
         "description" => __('Find icon here: <a target="_blank" href="https://themify.me/themify-icons">Themify Icons</a>. Example: ti-wallet', 'icos')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Title', 'icos'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Description', 'icos'),
         "param_name" => "content",
         "value" => "",
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Style", 'icos'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Icon Left', 'icos')   => 'left',
                     esc_html__('Icon Right', 'icos')  => 'right',              
                  ),
      ),
    )
    ));
}

// Sale Info
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Sale Info", 'icos'),
   "base" => "isale",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Sale Token Info", 'icos'),
          'value' => '',
          'param_name' => 'info',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  "type" => "textfield",
                  "heading" => esc_html__("Title", 'icos'),
                  "param_name" => "title",
                  "value" => "",
               ),
               array(
                  "type" => "textarea",
                  "heading" => esc_html__("Details", 'icos'),
                  "param_name" => "des",
                  "value" => "",
               ),
          )
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("2 Columns", 'icos'),
         "param_name" => "cols",
         "value" => "",
      )
    )
   ));
}


// Process
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Process", 'icos'),
   "base" => "icoprocess",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Process", 'icos'),
          'value' => '',
          'param_name' => 'process',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  "type" => "iconpicker",
                  "heading" => esc_html__("Icon Nav", 'icos'),
                  "param_name" => "icon",
                  "value" => "",
               ),
               array(
                  "type" => "textfield",
                  "heading" => esc_html__("Title", 'icos'),
                  "param_name" => "title",
                  "value" => "",
               ),
               array(
                  "type" => "textarea",
                  "heading" => esc_html__("Details", 'icos'),
                  "param_name" => "des",
                  "value" => "",
               ),
          )
      )
    )
   ));
}


// CountDown
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT CountDown", 'icos'),
   "base" => "cdown",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Title', 'icos'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Date Time", 'icos'),
         "param_name" => "date",
         "value" => "",
         "description" => "Add date time following: yyyy/mm/dd. Example: 2018/05/05."
      ),
      array(
          "type" => "checkbox",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Token Sale Status?", 'icos'),
          "param_name" => "bar",
          "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Current Percent", 'icos'),
         "param_name" => "current",
         "value" => "",
         "description" => "Example: 70%.",
         "dependency"  => array( 'element' => 'bar', 'not_empty' => true ),
      ),
      array(
          "type" => "param_group",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Rounds/Steps", 'icos'),
          "param_name" => "prog",
          "value" => "",
          "dependency"  => array( 'element' => 'bar', 'not_empty' => true ),
          "params" => array(
               array(
                  "type" => "textfield",
                  "heading" => esc_html__("Round Name", 'icos'),
                  "param_name" => "step",
                  "value" => "",
               ),
               array(
                  "type" => "textfield",
                  "heading" => esc_html__("Round Percent", 'icos'),
                  "param_name" => "pstep",
                  "value" => "",
                  "description" => "Example: 20%.",
               )
          )
      ),
      array(
         "type" => "vc_link",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Button", 'icos'),
         "param_name" => "btn",
      ),
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Payment Icon", 'icos'),
          'value' => '',
          'param_name' => 'icon',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  "type" => "iconpicker",
                  "heading" => esc_html__("Font Awesome Version 4", 'icos'),
                  "param_name" => "name",
                  "value" => "",
               ),
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "heading" => esc_html__("Font Awesome Version 5", 'icos'),
                  "param_name" => "nname",
                  "value" => "",
                  "description" => "Input class icon. Find icons here: <a target='_blank' href='https://fontawesome.com/icons'>Font Awesome Version 5</a>"
               ),
          )
      ),
      array(
          "type" => "checkbox",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Extra Line", 'icos'),
          "param_name" => "line",
          "value" => "",
      )
    )
   ));
}

// CountDown 2
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT CountDown 2", 'icos'),
   "base" => "cdown2",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Title', 'icos'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Date Time", 'icos'),
         "param_name" => "date",
         "value" => "",
         "description" => "Add date time following: yyyy/mm/dd. Example: 2018/09/05."
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Details', 'icos'),
         "param_name" => "content",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Current Percent", 'icos'),
         "param_name" => "pcur",
         "value" => "",
         "description" => "Example: 70%.",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Current Number Token", 'icos'),
         "param_name" => "cur",
         "value" => "",
      ),
      array(
          "type" => "param_group",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Rounds/Steps", 'icos'),
          "param_name" => "prog",
          "value" => "",
          "params" => array(
               array(
                  "type" => "textfield",
                  "heading" => esc_html__("Round Name", 'icos'),
                  "param_name" => "step",
                  "value" => "",
               ),
               array(
                  "type" => "textfield",
                  "heading" => esc_html__("Round Percent", 'icos'),
                  "param_name" => "pstep",
                  "value" => "",
                  "description" => "Example: 20%.",
               )
          )
      ),
      array(
         "type" => "vc_link",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Button", 'icos'),
         "param_name" => "btn",
      ),
      array(
         "type" => "vc_link",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Video", 'icos'),
         "param_name" => "video",
      ),
      array(
         "type" => "vc_link",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Whitepaper", 'icos'),
         "param_name" => "paper",
      ),
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Payment Icon", 'icos'),
          'value' => '',
          'param_name' => 'icon',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  "type" => "iconpicker",
                  "heading" => esc_html__("Font Awesome Version 4", 'icos'),
                  "param_name" => "name",
                  "value" => "",
               ),
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "heading" => esc_html__("Font Awesome Version 5", 'icos'),
                  "param_name" => "nname",
                  "value" => "",
                  "description" => "Input class icon. Find icons here: <a target='_blank' href='https://fontawesome.com/icons'>Font Awesome Version 5</a>"
               ),
          )
      )
    )
   ));
}

// RoadMap
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT RoadMap", 'icos'),
   "base" => "rmap",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("RoadMap", 'icos'),
          'value' => '',
          'param_name' => 'road',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  "type" => "textfield",
                  "heading" => esc_html__("Time", 'icos'),
                  "param_name" => "date",
                  "value" => "",
               ),
               array(
                  "type" => "textarea",
                  "heading" => esc_html__("Details", 'icos'),
                  "param_name" => "des",
                  "value" => "",
               ),
               array(
                  "type" => "checkbox",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_html__("Step Done", 'icos'),
                  "param_name" => "done",
                  "value" => "",
               ),
               array(
                  "type" => "checkbox",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_html__("Step Down", 'icos'),
                  "param_name" => "down",
                  "value" => "",
               ),
               array(
                  "type" => "checkbox",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_html__("Step Higher", 'icos'),
                  "param_name" => "high",
                  "value" => "",
               )
          )
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Style", 'icos'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1', 'icos')   => 's1',
                     esc_html__('Style 2', 'icos')   => 's2',               
                     esc_html__('Style 3', 'icos')   => 's3',               
                  ),
      ),
      array(
          "type" => "checkbox",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Navigation", 'icos'),
          "param_name" => "nav",
          "value" => "",
          "dependency"  => array( 'element' => 'style', 'value' => 's3' ),
      )
    )
   ));
}

// Member Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Member Team", 'icos'),
   "base" => "member",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'icos'),
         "param_name" => "photo",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Member Name", 'icos'),
         "param_name" => "name",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Member Job", 'icos'),
         "param_name" => "job",
         "value" => "",
      ),
      array(
         "type"      => "select_product",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Popup Details Member", 'icos'),
         "param_name"=> "idpost",
         "value"     => "",
         "description" => esc_html__("Select member team.", 'icos'),
      ),
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Socials", 'icos'),
          'value' => '',
          'param_name' => 'social',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  'type' => 'iconpicker',
                  'value' => '',
                  'heading' => 'Social Icon',
                  'param_name' => 'icon',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Social Link',
                  'param_name' => 'link',
               ),
          )
      ),
      array(
          "type" => "checkbox",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Square Style", 'icos'),
          "param_name" => "square",
          "value" => "",
      )
    )
    ));
}

if ( ! function_exists( 'is_plugin_active' ) ) {
   require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {     
   if ( function_exists( 'vc_add_shortcode_param' ) ) {
      vc_add_shortcode_param( 'select_product', 'select_param', get_template_directory_uri() . '/framework/admin/js/select-field.js' );
   } elseif ( function_exists( 'add_shortcode_param' ) ) {
      add_shortcode_param( 'select_product', 'select_param', get_template_directory_uri() . '/framework/admin/js/select-field.js' );
   }
}   

function select_param( $settings, $value ) {
   // Generate dependencies if there are any
   $dependency = $settings;
   $args = array(
     'numberposts' => -1,
     'post_type'   => 'team'
   );
   $posts = get_posts( $args );
   $cat = array();
   foreach( $posts as $post ) {
      if( $post ) {
         $cat[] .= sprintf('<option value="%s">%s</option>',
            esc_attr( $post->ID ),
            $post->post_title
         );
      }

   }

   return sprintf(
      '<select name="%s" value="%s" data-value="%s" class="wpb-input-categories wpb_vc_param_value wpb-textinput %s %s_field" %s>
      <option value="">None</option>
      %s
      </select>',
      esc_attr( $settings['param_name'] ),
      esc_attr( $value ),
      esc_attr( $value ),
      esc_attr( $settings['param_name'] ),
      esc_attr( $settings['type'] ),
      $dependency,
      implode( '', $cat )
   );
}


// Member Team 2
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Member Team 2", 'icos'),
   "base" => "member2",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'icos'),
         "param_name" => "photo",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Member Name", 'icos'),
         "param_name" => "name",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Member Job", 'icos'),
         "param_name" => "job",
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Experience", 'icos'),
         "param_name" => "content",
         "value" => "",
      ),
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Socials", 'icos'),
          'value' => '',
          'param_name' => 'social',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  'type' => 'iconpicker',
                  'value' => '',
                  'heading' => 'Social Icon',
                  'param_name' => 'icon',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Social Link',
                  'param_name' => 'link',
               ),
          )
      )
    )
    ));
}


// Skill
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Skill", 'icos'),
   "base" => "skill",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'icos'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Percent", 'icos'),
         "param_name" => "per",
         "value" => "",
      ),
    )
    ));
}


// Testimonial
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Testimonials", 'icos'),
   "base" => "testi",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("They Said", 'icos'),
          'value' => '',
          'param_name' => 'testi',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                   "type" => "attach_image",
                   "heading" => esc_html__("Photo", 'icos'),
                   "param_name" => "photo",
                   "value" => "",
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Title',
                  'param_name' => 'title',
               ),
               array(
                  'type' => 'textarea',
                  'value' => '',
                  'heading' => 'Details',
                  'param_name' => 'des',
               ),
          )
      )
    )
    ));
}


// FAQs
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT FAQs", 'icos'),
   "base" => "otfaq",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("FAQs", 'icos'),
          'value' => '',
          'param_name' => 'faq',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  "type" => "textfield",
                  "heading" => esc_html__("Question", 'icos'),
                  "param_name" => "title",
                  "value" => "",
               ),
               array(
                  "type" => "textarea",
                  "heading" => esc_html__("Answer", 'icos'),
                  "param_name" => "ans",
                  "value" => "",
               ),
               array(
                 "type" => "checkbox",
                 "class" => "",
                 "heading" => esc_html__("Open", 'icos'),
                 "param_name" => "open",
                 "value" => "",
               )
          )
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Style", 'icos'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1: Accordion', 'icos')   => 's1',
                     esc_html__('Style 2: 2 Columns', 'icos')   => 's2',               
                  ),
      ),
    )
   ));
}

// Latest Blog
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Latest Blog", 'icos'),
   "base" => "lblog",
   "class" => "",
   "category" => 'ICOs Element',
   "icon" => "icon-st",
   "params" => array(  
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Number Columns', 'icos'),
         "param_name" => "number",
         "value" => array(
                     esc_html__('3 Columns', 'icos')     => '3', 
                     esc_html__('4 Columns', 'icos')     => '4',
                     esc_html__('2 Columns', 'icos')     => '2',
                  ), 
      ),
      array(
         "type" => "vc_link",
         "heading" => esc_html__("Bottom Link", 'icos'),
         "param_name" => "btn",         
      ),
    )
   ));
}