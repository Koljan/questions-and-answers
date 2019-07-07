/**
 * Get list of questions from session
 * Display only one question(on reload show question that is not answered)
 * On click next - Validate input is correct and save answer to session
 * Display questions that is not answered
 */

let DataController = (function () {
    let quizData = [], currentQuestionArrayKey;

    // Function constructor
    let QuizItem = function (id, question, answer) {
        this.id = id;
        this.question = question;
        this.answer = answer;
    };

    return {
        // Structure received data
        validateData: function () {
            let data, size, newItem;
            quizData = [];
            data = sessionQuestions;
            size = Object.keys(data).length;
            for (i = 0; i < size; i++) {
                let qId, questionText, questionAnswer;
                qId = Object.keys(data)[i];
                questionText = data[qId].question;
                questionAnswer = data[qId].answer;
                newItem = new QuizItem(qId, questionText, questionAnswer);
                quizData.push(newItem);
            }
            console.log(quizData);
        },
        getQuestion: function (array_key) {
            return quizData[array_key];
        },
        setCurrentlyDisplayedQuestionArrayKey: function (array_key) {
            return currentQuestionArrayKey = array_key;
        },
        testing: function () {
            console.log(quizData);
        },
        saveSessionAnswer: function (questionId, questionAnswer) {
            $.ajax({
                url: window.location.href,
                type: "POST",
                dataType: 'json',
                data: {
                    method: "saveAnswer",
                    qId: questionId,
                    answer: questionAnswer,
                },
                success: function (data) {
                    sessionQuestions[questionId].answer = data[questionId].answer;
                    DataController.validateData();
                }
            });
        },
        isFisrtsLastArrayElement: function (array_key) {
            if (array_key === quizData.length - 1) {
                return 'last'; // not a good solution for returning some random string.
            } else if (0 === array_key) {
                return 'first';
            } else{
                return null;
            }
        },

        // @deprecated
        // Function was used to show unanswered question first on reload
        // Decided to show from the beggining.
        // getUnansweredQuestion: function () {
        //     // By default all questions have answer as undefined
        //     let firstUnasweredQuestionObj;
        //     firstUnasweredQuestionObj = quizData.find(function (quizItm) {
        //         console.log(typeof quizItm.answer === "undefined");
        //         return typeof quizItm.answer === "undefined";
        //     });
        //     return firstUnasweredQuestionObj;
        // },
    };

})();
let UIController = (function () {

    let DOMstrings = {
        nextBtn: '.proceed-next-q',
        prevBtn: '.proceed-previous-q',
        activeQuestion: '#question-id-',
        btnSubmit: '.btn-submit',
        userSubmitForm: '.form-submit-user',
        questionsWrapper: '.questions-wrapper',
    };

    return {
        getDOMstrings: function () {
            return DOMstrings;
        },
        displayQuestion: function (questionObj) {
            let question = $(DOMstrings.activeQuestion + questionObj.id);
            if ("undefined" !== typeof questionObj.answer) {
                $(DOMstrings.activeQuestion + questionObj.id + " input").val(questionObj.answer);
            }
            question.toggleClass('active-question').siblings().removeClass('active-question');
        },
        getInput: function () {
            return {};
        },
        validateInput: function (questionObj) {
            // get input value
            let answerData = [], value, qSelector, errorSelector;
            answerData['is_valid'] = false;
            qSelector = $(DOMstrings.activeQuestion + questionObj.id + " input");
            value = qSelector.val();
            errorSelector = qSelector.closest(DOMstrings.activeQuestion + questionObj.id).find('.invalid-feedback');

            // check against validation rules
            if (value.length > 0 && value.length < 5) {
                answerData['qId'] = questionObj.id;
                answerData['value'] = value;
                answerData['is_valid'] = true;
                errorSelector.css("display", "none");
            } else {
                errorSelector.css("display", "block");
                answerData = [];
                answerData['is_valid'] = false;
            }

            // return true or false
            return answerData;
        },
        displayUserForm: function(){
            $(DOMstrings.questionsWrapper).addClass('hideEl');
            $(DOMstrings.userSubmitForm).removeClass('showEl');
            $(DOMstrings.userSubmitForm).addClass('showEl');

        },

        // input string last or first
        // Does not like hardcoded remove and add class. Better to toggleclass.
        // Because of the timing had to make this code
        manipulateNavigation: function (strLasrOrFirst) {
            if ('first' === strLasrOrFirst){
                $(DOMstrings.prevBtn +','+ DOMstrings.btnSubmit).addClass('hideEl');
                $(DOMstrings.prevBtn +','+ DOMstrings.btnSubmit).removeClass('showEl');
            } else if('last' === strLasrOrFirst){
                $(DOMstrings.nextBtn).addClass('hideEl');
                $(DOMstrings.nextBtn).removeClass('showEl');
                $(DOMstrings.btnSubmit).addClass('showEl');
                $(DOMstrings.btnSubmit).removeClass('hideEl');

            } else {
                $(DOMstrings.btnSubmit).addClass('hideEl');
                $(DOMstrings.btnSubmit).removeClass('showEl');
                $(DOMstrings.prevBtn).removeClass('hideEl');
                $(DOMstrings.nextBtn).removeClass('hideEl');
                $(DOMstrings.prevBtn).removeClass('showEl');
                $(DOMstrings.nextBtn).removeClass('showEl');
            }
        },
    };

})();


let controller = (function (DataCtrl, UICtrl) {
    let currentDisplayedQuestionArrayKey, currentQuestionObj;

    let validateData = function () {
        DataCtrl.validateData();
    };

    let ctrlDisplayQuestion = function (array_key) {

        currentQuestionObj = DataCtrl.getQuestion(array_key);
        UICtrl.displayQuestion(currentQuestionObj);
        UICtrl.manipulateNavigation(DataCtrl.isFisrtsLastArrayElement(array_key));
        currentDisplayedQuestionArrayKey = DataCtrl.setCurrentlyDisplayedQuestionArrayKey(array_key);

    };

    let setupEventListeners = function () {
        let DOM;
        DOM = UICtrl.getDOMstrings();

        //TODO events on next and prev buttons are 99% identical. Consider merge them
        $(DOM.nextBtn).on('click', function (e) {
            let validationResult;
            e.preventDefault();

            validationResult = UICtrl.validateInput(currentQuestionObj);
            if (true === validationResult['is_valid']) {
                // save answer to session data structure
                // TODO do not send ajax every time. Only needed when input changed
                DataCtrl.saveSessionAnswer(validationResult['qId'], validationResult['value']);
                ctrlDisplayQuestion(currentDisplayedQuestionArrayKey + 1);
            }
        });
        $(DOM.prevBtn).on('click', function (e) {
            e.preventDefault();
            validationResult = UICtrl.validateInput(currentQuestionObj);
            if (true === validationResult['is_valid']) {
                // save answer to session data structure
                DataCtrl.saveSessionAnswer(validationResult['qId'], validationResult['value']);
                ctrlDisplayQuestion(currentDisplayedQuestionArrayKey - 1);
            }
        });
        $(DOM.btnSubmit).on('click', function (e) {
            let validationResult;
            e.preventDefault();

            validationResult = UICtrl.validateInput(currentQuestionObj);
            if (true === validationResult['is_valid']) {
                DataCtrl.saveSessionAnswer(validationResult['qId'], validationResult['value']);
                UICtrl.displayUserForm();
            }
        });
    };

    return {
        init: function () {
            validateData();
            setupEventListeners();
            ctrlDisplayQuestion(0);
        }
    };

})(DataController, UIController);

controller.init();
