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
 * Redirect to Smarthinking via SSO
 *
 * @package    block_smarthinking
 * @copyright  2014 Alex Rowe <arowe@studygroup.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("../../config.php");
require_once($CFG->libdir.'/filelib.php');

require_login();

$apiurl = $CFG->block_smarthinking_apiurl;
$partnerid = $CFG->block_smarthinking_partnerid;
$partnerpass = $CFG->block_smarthinking_partnerpass;
$userid = $USER->username;
$useremail = $USER->email;
$firstname = $USER->firstname;
$lastname = $USER->lastname;
$zipcode = $CFG->block_smarthinking_partnerzip;
$params = "partnerid=".$partnerid."&partnerpass=".$partnerpass."&userid=".$userid."&useremail=".$useremail."&firstname=".$firstname."&lastname=".$lastname."&zipcode=".$zipcode;

$curl = new curl();
$response = $curl->post($apiurl, $params);

if (strpos($response, 'valid-request') !== false) {
    $result = html_entity_decode($response);
    $url = simplexml_load_string($result);
    redirect($url);
}    

$error = get_string('error', 'block_smarthinking');
$error_desc = get_string('error_desc', 'block_smarthinking');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url('/blocks/smarthinking/redirect.php');
$PAGE->set_title($error);
$PAGE->set_heading($error);
$PAGE->set_pagelayout('standard');

echo $OUTPUT->header();
echo $OUTPUT->heading($error);
echo $OUTPUT->box($error_desc);
echo $OUTPUT->footer();
