<?php
/**
 * Activity viewed.
 *
 * @package     mod_reactive
 * @copyright   2021 Ferran Recio <ferran@moodle.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_reactive\event;

use mod_reactive\manager;

defined('MOODLE_INTERNAL') || die();

/**
 * The course_module_viewed event class.
 *
 * @package    mod_reactive
 * @copyright  2020 Ferran Recio <ferran@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_module_viewed extends \core\event\course_module_viewed {

    /**
     * Init method.
     *
     * @return void
     */
    protected function init(): void {
        $this->data['objecttable'] = manager::FOLDER;
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_PARTICIPATING;
    }

    /**
     * This is used when restoring course logs where it is required that we
     * map the objectid to it's new value in the new course.
     *
     * @return array
     */
    public static function get_objectid_mapping() {
        return ['db' => manager::FOLDER, 'restore' => manager::FOLDER];
    }
}
