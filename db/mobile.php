$addons = array(
    "qtype_YOURQTYPENAME" => array(
        "handlers" => array( // Different places where the add-on will display content.
            'YOURQTYPENAME' => array( // Handler unique name (can be anything).
                'displaydata' => array(
                    'title' => 'Qtype Name',
                    'icon' => '/question/type/YOURQTYPENAME/pix/icon.gif',
                    'class' => '', //What does this do?
                ),
                'delegate' => 'CoreQuestionDelegate', // Delegate (where to display the link to the add-on).
                'method' => 'mobile_get_YOURQTYPENAME',
                'offlinefunctions' => array(
                    'mobile_get_YOURQTYPENAME' => array(),
                ), // Function needs caching for offline.
               'styles' => array(
                    'url' => '/question/type/YOURQTYPENAME/mobile/styles_app.css',
                    'version' => '1.00'
                ),
                'lang' => array(
                    array('Question name', 'pluginname')
                )
            )
        ),
    )
);
