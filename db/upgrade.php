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
 * Multi-answer question type upgrade code.
 *
 * @package    qtype
 * @subpackage YOURQTYPENAME
 * @copyright  2912 Marcus Green 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade code for the YOURQTYPENAME question type.
 * A selection of things you might want to do when upgrading
 * to a new version. This file is generally not needed for 
 * the first release of a question type.
 * @param int $oldversion the version we are upgrading from.
 */
function xmldb_qtype_YOURQTYPENAME_upgrade($oldversion = 0) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();
    if ($oldversion < 2006082505) {        
        $table = new xmldb_table('question_tablename');
        $field = new xmldb_field('fieldname');
        $dbman->drop_field($table, $field);
    }

    if (!$dbman->field_exists('question_tablename', 'somefield')) {
        $field = new xmldb_field('somefield', XMLDB_TYPE_INTEGER, '1');
        $table = new xmldb_table('question_tablename');
        $dbman->add_field($table, $field);
    }

    
    if( !$dbman->table_exists('question_YOURQTYPENAME_feedback')){
            $table = new xmldb_table('question_YOURQTYPENAME_feature');
            $table->add_field('id', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null, null);
            $table->add_field('question', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, null);
            $table->add_field('somefield', XMLDB_TYPE_CHAR, '255', null, XMLDB_NULL, null, null, null, '');
            $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'), null, null);
            $dbman->create_table($table);
     }
    // Gapfill savepoint reached.
    upgrade_plugin_savepoint(true, 2006082519, 'qtype', 'YOURQTYPENAME');

    return;
}
