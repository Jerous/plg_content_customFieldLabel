<?php
// In your methods, the following properties are available:

// $this->params: the parameters set for this plugin by the administrator
// $this->_name: the name of the plugin
// $this->_type: the group (type) of the plugin
// $this->db: the db object (since Joomla 3.1)
// $this->app: the application object (since Joomla 3.1)

// Tip To use $this->db and $this->app, JPlugin tests if the property exists and is not private. If it is desired for the default objects to be used, create un-instantiated properties in the plugin class (i.e. protected $db; protected $app; in the same area as protected $autoloadLanguage = true;). The properties will not exist unless explicitly created.

// no direct access
defined ( '_JEXEC' ) or die ( 'Restricted access' );
 
class plgContentCusfields extends JPlugin {
 
        /**
         * Load the language file on instantiation.
         * Note this is only available in Joomla 3.1 and higher.
         * If you want to support 3.0 series you must override the constructor
         *
         * @var boolean
         * @since 3.1
         */
 
        protected $autoloadLanguage = true;
 
        function onContentPrepareForm($form, $data) {
        
                $app = JFactory::getApplication();
                $option = $app->input->get('option');
 
                switch($option) {
 
                    case 'com_content':
                        if ($app->isAdmin()) {
                                JForm::addFormPath(__DIR__ . '/forms');
                                //Show specific forms based on categories
                                $form->loadFile('content', false);              
                        }
                        return true;
                }
                return true;
        }
}
?>