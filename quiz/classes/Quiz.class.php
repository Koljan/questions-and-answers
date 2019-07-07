<?php

require '/../../libs/Smarty.class.php';
require 'Session.class.php';
require 'Util.class.php';

class Quiz
{
    private $session;
    private $db;
    private $smarty;

    function __construct()
    {
        $this->session = new Session();
        // destroying session used for debugging purpose
        //$this->session->destroySession();
        $this->db = new Util();
        $this->smarty = new Smarty();
        if (isset($_REQUEST['method']) && 'saveAnswer' === $_REQUEST['method']) {
            $this->saveAnswerToSession();
        } else {
            $this->renderPage();
        }
    }

    private function getQuestions()
    {
        if (!isset($_SESSION[$this->session->id])) {
            $quiz_id = (int)$_REQUEST['quiz_id'];
            $questions = $this->getQuestionsDb($quiz_id);
            $_SESSION[$this->session->id]['questions'] = $questions;
            // solve issue when accessing another quiz(session stores questions from first visit parameter
            // accessing another quiz does not overwrite questions on purpose. Maybe better to redirect to url with request parametere
        }

        // Assign Session questions to JS. Did not find better solution(do not like this one)
        $this->parseSessionQuestionsJS();
    }

    private function getQuestionsDb($quiz_id)
    {
        $conntection = $this->db->getMysqlConn();
        $sql = "SELECT id, text
                FROM questions
                WHERE quiz_id = $quiz_id";
        $result = $conntection->query($sql);
        if ($result->num_rows > 0) {
            $questions = array();
            while ($row = $result->fetch_assoc()) {
                $questions[$row['id']]['question'] = $row['text'];
            }
        }
        return $questions;
    }

    private function renderPage()
    {
        $this->getQuestions();

        $this->smarty->assign('smarty', $this->smarty);
        $this->smarty->assign('session_id', $this->session->id);
        $this->smarty->display('index.tpl');
    }

    private function parseSessionQuestionsJS()
    {
        // Parse to JS
        $jsquestions = json_encode($_SESSION[$this->session->id]['questions']);
        $this->smarty->assign('jsquestions', $jsquestions);
    }

    private function saveAnswerToSession()
    {
        if (!empty($_REQUEST['qId']) && !empty($_REQUEST['answer'])) {
            $question_id = $_REQUEST['qId'];
            $answer_str = $_REQUEST['answer'];
            $_SESSION[$this->session->id]['questions'][$question_id]['answer'] = $answer_str;
            $data = json_encode($_SESSION[$this->session->id]['questions']);
            echo $data;
        }
    }

    private function sanitizeData($data)
    {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        return $data;
    }
}
