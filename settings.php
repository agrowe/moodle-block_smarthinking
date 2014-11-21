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
 * Smarthinking Settings
 *
 * @package    block_smarthinking
 * @copyright  2014 Alex Rowe <arowe@studygroup.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(
        new admin_setting_configtext(
            'block_smarthinking_apiurl',
            get_string('apiurl', 'block_smarthinking'),
            get_string('apiurl_desc', 'block_smarthinking'),
            'https://services.smarthinking.com/login/suplogin.cfm',
            PARAM_TEXT)); 

    $settings->add(
        new admin_setting_configtext(
            'block_smarthinking_partnerid',
            get_string('partnerid', 'block_smarthinking'),
            get_string('partnerid_desc', 'block_smarthinking'),
            '',
            PARAM_TEXT)); 

    $settings->add(
        new admin_setting_configtext(
            'block_smarthinking_partnerpass',
            get_string('partnerpass', 'block_smarthinking'),
            get_string('partnerpass_desc', 'block_smarthinking'),
            '',
            PARAM_TEXT));

    $settings->add(
        new admin_setting_configtext(
            'block_smarthinking_partnerzip',
            get_string('partnerzip', 'block_smarthinking'),
            get_string('partnerzip_desc', 'block_smarthinking'),
            '',
            PARAM_INT));
}
