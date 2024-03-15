const questions = [
    {
        question: "Primera pregunta",
        answers: [
            { text: "Respuesta1", correct: false },
            { text: "Respuesta2", correct: true }, // Correct answer
            { text: "Respuesta3", correct: false },
            { text: "Respuesta4", correct: false },
        ]
    },
    {
        question: "Segunda pregunta",
        answers: [
            { text: "Respuesta1", correct: true }, // Correct answer
            { text: "Respuesta2", correct: false },
            { text: "Respuesta3", correct: false },
            { text: "Respuesta4", correct: false },
        ]
    },
    // Add more questions here
];

// DOM element references
const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

let currentQuestionIndex = 0;
let score = 0;

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.textContent = "Next"; // Use textContent for button labels
    showQuestion();
}

function showQuestion() {
    resetState();
    if (currentQuestionIndex >= questions.length) {
        return; // Handle end of quiz scenario (optional)
    }

    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.textContent = `${questionNo}. ${currentQuestion.question}`; // Use textContent for question display

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.textContent = answer.text;
        button.classList.add("btn");
        answerButtons.appendChild(button);
        button.dataset.correct = answer.correct; // Use dataset for correct answer
        button.addEventListener("click", selectAnswer);
    });
}

function resetState() {
    nextButton.style.display = "none";
    while (answerButtons.firstChild) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true"; // Use dataset for correct answer

    if (isCorrect) {
        selectedBtn.classList.add("correct");
        score++;
    } else {
        selectedBtn.classList.add("incorrect");
    }

    Array.from(answerButtons.children).forEach(button => {
        if (button.dataset.correct === "true") {
            button.classList.add("correct");
        }
        button.disabled = true;
    });

    nextButton.style.display = "block";
}

function showScore() {
    resetState();
    questionElement.textContent = `Tu puntuación es ${score} sobre ${questions.length}!`;
    nextButton.textContent = "Comenzar de nuevo";
    nextButton.style.display = "block";
}

function handleNextButton() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        showScore();
    }
}

nextButton.addEventListener("click", () => {
    handleNextButton();
});

startQuiz();
