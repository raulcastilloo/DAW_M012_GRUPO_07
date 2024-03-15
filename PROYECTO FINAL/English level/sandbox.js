"use strict";

const quizData = [
    {
        question: "Primera pregunta",
        a: "Primera respuesta",
        b: "Segunda respuesta",
        c: "Tercera respuesta",
        d: "Cuarta respuesta",
        correct: "b" // Use lowercase "correct" for consistency
    },

    {
        question: "Segunda pregunta",
        a: "Primera respuesta",
        b: "Segunda respuesta",
        c: "Tercera respuesta",
        d: "Cuarta respuesta",
        correct: "b" // Use lowercase "correct" for consistency
    },
    // ... other quiz questions (ensure correct property casing)
];

const quiz = document.querySelector(".quiz-body");
const answerEls = document.querySelectorAll(".answer");
const questionEL = document.getElementById("question");
const footerEl = document.querySelector(".quiz-footer");
const quizDetailEl = document.querySelector(".quiz-details");

const a_txt = document.getElementById("a_text");
const b_txt = document.getElementById("b_text");
const c_txt = document.getElementById("c_text");
const d_txt = document.getElementById("d_text");
const btnSubmit = document.getElementById("btn");

let currentQuiz = 0;
let score = 0;

loadQuiz();

function loadQuiz() {
    deselectAnswer();
    const currentQuizData = quizData[currentQuiz];

    questionEL.innerText = currentQuizData.question;
    a_txt.innerText = currentQuizData.a;
    b_txt.innerText = currentQuizData.b;
    c_txt.innerText = currentQuizData.c;
    d_txt.innerText = currentQuizData.d;

    quizDetailEl.innerHTML = `<p>${currentQuiz + 1} of ${quizData.length} Questions</p>`;
}

// Deselect radio buttons (corrected typo)
function deselectAnswer() {
    answerEls.forEach((answerEl) => {
        answerEl.checked = false;
    });
}

function getSelected() {
    let answer;
    answerEls.forEach((answerEl) => {
        if (answerEl.checked) {
            answer = answerEl.id;
        }
    });
    return answer;
}

btnSubmit.addEventListener("click", () => {
    const answer = getSelected();

    if (answer) {
        if (answer === quizData[currentQuiz].correct) {
            score++;
        }
        nextQuestion();
    }
});

function nextQuestion() {
    currentQuiz++;

    if (currentQuiz < quizData.length) {
        loadQuiz();
    } else {
        quiz.innerHTML = `<h2>Has respondido ${score}/${quizData.length} Preguntas correctamente</h2>
        <button type="button" onclick="location.reload()">Recargar</button>`;
        footerEl.style.display = "none";
    }
}
