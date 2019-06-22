<?php

function get_tests_by_type($type)
{
    return R::getAll( 'SELECT * FROM tests WHERE type = :type', array(':type' => $type) );
}

function get_test_data_by_id($test_id)
{
    return R::getRow( 'SELECT * FROM tests WHERE id = :test_id', array(':test_id' => $test_id) );
}

function get_questions_by_id($test_id)
{
    if(!$test_id) return;
    return R::getAll('SELECT * FROM questions WHERE parent_test = :id', array(':id' => $test_id) );
}

function get_answers_by_id($test_id)
{
    if(!$test_id) return;
    return R::getAll('SELECT q.question, q.additional, q.picture, q.parent_test, a.id, a.answer, a.parent_question, a.is_correct
                    FROM questions q
                    LEFT JOIN answers a
                    ON q.id = a.parent_question
                    WHERE q.parent_test = :id', array(':id' => $test_id) );
}