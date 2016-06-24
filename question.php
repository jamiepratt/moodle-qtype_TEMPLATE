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
 * YOURQTYPENAME question definition class.
 *
 * @package    qtype
 * @subpackage YOURQTYPENAME
 * @copyright  THEYEAR YOURNAME (YOURCONTACTINFO)

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

/** 
*This holds the definition of a particular question of this type. 
*If you load three questions from the question bank, then you will get three instances of 
*that class. This class is not just the question definition, it can also track the current 7
*state of a question as a student attempts it through a question_attempt instance. 
*/


/**
 * Represents a YOURQTYPENAME question.
 *
 * @copyright  THEYEAR YOURNAME (YOURCONTACTINFO)

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_YOURQTYPENAME_question extends question_graded_automatically_with_countback {

    /* it may make more sense to think of this as get expected data types */
    public function get_expected_data() {
        // TODO.
        return array();
    }
    
     public function start_attempt(question_attempt_step $step, $variant) {
        //TODO
        /* there are 9 occurrances of this method defined in files called question.php a new install of Moodle
        so you are probably going to have to define it */
    }
    
    /**
     * @return summary a string that summarises how the user responded. This 
     * is used in the quiz responses report
     * */
    public function summarise_response(array $response) {
        // TODO.
        return null;
    }

    public function is_complete_response(array $response) {
        // TODO.
        return true;
    }

    public function get_validation_error(array $response) {
        // TODO.
        return '';
    }

    public function is_same_response(array $prevresponse, array $newresponse) {
        // TODO.
        return question_utils::arrays_same_at_key_missing_is_blank(
                $prevresponse, $newresponse, 'answer');
    }

   /**
     * @return question_answer an answer that
     * contains the a response that would get full marks.
     * used in preview mode
     */
    public function get_correct_response() {
        // TODO.
        return array();
    }


    public function check_file_access($qa, $options, $component, $filearea,
            $args, $forcedownload) {
        // TODO.
        if ($component == 'question' && $filearea == 'hint') {
            return $this->check_hint_file_access($qa, $options, $args);

        } else {
            return parent::check_file_access($qa, $options, $component, $filearea,
                    $args, $forcedownload);
        }
    }
    /**
     * @param array $response responses, as returned by
     *      {@link question_attempt_step::get_qt_data()}.
     * @return array (number, integer) the fraction, and the state.
     */
    public function grade_response(array $response) {
        // TODO.
        $fraction = 0;
        return array($fraction, question_state::graded_state_for_fraction($fraction));
    }
     
     /**
     * Work out a final grade for this attempt, taking into account all the
     * tries the student made. Used in interactive behaviour once all
     * hints have been used.     * 
     * @param array $responses an array of arrays of the response for each try. 
     * Each element of this array is a response array, as would be 
     * passed to {@link grade_response()}. There may be between 1 and 
     * $totaltries responses. 
     * @param int $totaltries is the maximum number of tries allowed. Generally 
     * not used in the implementation.
     * @return numeric the fraction that should be awarded for this
     * sequence of response. 
     * 
     */
    public function compute_final_grade($responses, $totaltries) {
        /*This method is typically where penalty is used. 
        When questions are run using the 'Interactive with multiple 
        tries or 'Adaptive mode' behaviour, so that the student will 
        have several tries to get the question right, then this option 
        controls how much they are penalised for each incorrect try.

        The penalty is a proportion of the total question grade, so if 
        the question is worth three marks, and the penalty is 0.3333333, 
        then the student will score 3 if they get the question right first 
        time, 2 if they get it right second try, and 1 of they get it right 
        on the third try.*/
        //TODO
        return 0;
    }
}
