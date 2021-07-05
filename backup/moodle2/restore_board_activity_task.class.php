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
 * @package     mod_board
 * @author      Karen Holland <karen@brickfieldlabs.ie>
 * @copyright   2021 Brickfield Education Labs <https://www.brickfield.ie/>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/board/backup/moodle2/restore_board_stepslib.php'); // Because it exists (must).

class restore_board_activity_task extends restore_activity_task {

    protected function define_my_settings() {
        // No particular settings for this activity.
    }

    protected function define_my_steps() {
        $this->add_step(new restore_board_activity_structure_step('board_structure', 'board.xml'));
    }

    public static function define_decode_contents() {
        $contents = array();

        $contents[] = new restore_decode_content('board', array('intro'), 'board');
        $contents[] = new restore_decode_content('board_notes', array('content'), 'board_note');

        return $contents;
    }

    public static function define_decode_rules() {
        return array();
    }

    public function get_fileareas() {
        return array('images', 'backgrond');
    }
}