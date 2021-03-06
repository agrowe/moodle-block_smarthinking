<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Smarthinking Block
 *
 * @package    block_smarthinking
 * @copyright  2014 Alex Rowe <arowe@studygroup.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_smarthinking extends block_base {
    public function init() {
        $this->title = get_string('smarthinking', 'block_smarthinking');
    }

    function has_config() {
        return true;
    }
    
    function instance_allow_multiple() {
        return false;
    }

    function get_content() {
        global $CFG;
        if ($this->content !== NULL) {
            return $this->content;
        }
        $text = get_string('link_text', 'block_smarthinking');
        $this->content = new stdClass;
        $this->content->text = '<a href="'.$CFG->wwwroot.'/blocks/smarthinking/redirect.php" title="'.$text.'">'.$text.'</a>';
        return $this->content;
    }
}
