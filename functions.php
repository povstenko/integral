<?php

function get_tests_by_type($type)
{
	return R::getAll("SELECT t.id, t.name, t.description, s.subject, u.login, t.date
                    FROM tests t
                    LEFT JOIN users u
                    ON t.author_id = u.id
                    LEFT JOIN subjects s
                    ON t.subject_id = s.id 
                    WHERE s.subject = '$type'");
}

function get_test_data_by_id($test_id)
{
	return R::getRow("SELECT t.id, t.name, t.description, s.subject, u.login, t.date
                    FROM tests t
                    LEFT JOIN users u
                    ON t.author_id = u.id
                    LEFT JOIN subjects s
                    ON t.subject_id = s.id 
                    WHERE t.id = '$test_id'");
}

function get_test_data_by_author_id($author_id)
{
	if (!$author_id) return;
	return R::getAll("SELECT t.id, t.name, t.description, s.subject, u.login, t.date
					FROM tests t
					LEFT JOIN users u
					ON t.author_id = u.id
					LEFT JOIN subjects s
					ON t.subject_id = s.id 
					WHERE u.id = '$author_id'");
}

function get_questions_by_id($test_id)
{
	if (!$test_id) return;
	return R::getAll("SELECT * FROM questions WHERE parent_test_id = '$test_id'");
}

function get_answers_by_id($test_id)
{
	if (!$test_id) return;
	return R::getAll("SELECT q.question, q.additional, q.picture, q.parent_test_id, a.id, a.answer, a.parent_question_id, a.is_correct
                    FROM questions q
                    LEFT JOIN answers a
                    ON q.id = a.parent_question_id
                    WHERE q.parent_test_id = '$test_id'");
}

function generate_random_string($length)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';

	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}

	return $randomString;
}
