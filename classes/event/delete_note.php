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

namespace mod_board\event;

/**
 * Delete note event handler.
 * @package     mod_board
 * @author      Karen Holland <karen@brickfieldlabs.ie>
 * @copyright   2021 Brickfield Education Labs <https://www.brickfield.ie/>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class delete_note extends \core\event\base {
    /**
     * Init function.
     */
    protected function init() {
        $this->data['crud'] = 'd';
        $this->data['edulevel'] = self::LEVEL_PARTICIPATING;
        $this->data['objecttable'] = 'board';
    }

    /**
     * Get name.
     * @return \lang_string|string
     */
    public static function get_name() {
        return get_string('event_delete_note', 'mod_board');
    }

    /**
     * Get description.
     * @return \lang_string|string|null
     */
    public function get_description() {
        $obj = new \stdClass;
        $obj->userid = $this->userid;
        $obj->objectid = $this->objectid;
        $obj->columnid = $this->other['columnid'];
        return get_string('event_delete_note_desc', 'mod_board', $obj);
    }
}
