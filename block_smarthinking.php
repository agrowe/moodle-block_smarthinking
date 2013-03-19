<?php

/* This file contains one class which defines a block that allows
   the user to connect to SmarThinking using their Moodle credentials.
   Login occurs as an asynchronous process so the Yahoo yui libraries
   are required.
   Before using this block, the Moodle Admin must set the Partner ID,
   Partner Password and zipcode as required by SmarThinking.

   (C) 2010 Pall Thayer and SUNY Purchase College, Purchase, NY
   @license http://www.gnu.org/licenses/gpl.html GNU Public License
*/

// Updated By Alex Rowe - Study Group [Hacky Method but it works]

class block_smarthinking extends block_base {
    public function init() {
        $this->title = get_string('smarthinking', 'block_smarthinking');
    }

    function has_config() {
        return true;
    }

    function get_content() {
        global $CFG, $USER;
        if ($this->content !== NULL) {
            return $this->content;
        }
        $this->content = new stdClass;
        $this->content->text = "
            <script type=\"text/javascript\" src=\"http://yui.yahooapis.com/2.9.0/build/yahoo/yahoo-min.js\"></script> 
            <script type=\"text/javascript\" src=\"http://yui.yahooapis.com/2.9.0/build/event/event-min.js\"></script> 
            <script type=\"text/javascript\" src=\"http://yui.yahooapis.com/2.9.0/build/connection/connection-min.js\"></script> 
            <script type=\"text/javascript\" src=\"http://yui.yahooapis.com/2.9.0/build/dom/dom-min.js\"></script>  
            <script type=\"text/javascript\" src=\"".$CFG->wwwroot."/blocks/".$this->name()."/smarthinking.js\"></script>
            <div style=\"font-size:12px;font-family:sans-serif;text-align:center;\"><a href=\"#\" onclick=\"get_st_url('$CFG->block_smarthinking_partnerid', '$CFG->block_smarthinking_partnerpass', '$USER->username', '$USER->email', '$USER->firstname', '$USER->lastname', '$CFG->block_smarthinking_partnerzip', '$CFG->wwwroot'); return false;\">Connect to SmarThinking</a></div>";
        return $this->content;
    }
}
?>