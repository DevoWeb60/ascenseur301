const showAnswerButton = document.querySelector("#show-answer");
const nextQuestionButton = document.querySelector("#next-question");
const restartButton = document.querySelector("#restart");
const addQuestionButton = document.querySelector(".addQuestionPopup");
const modalContainer = document.querySelector(".modalContainer");
const questionModal = document.querySelector("form");

const questionContainer = document.querySelector(".question");
const answerContainer = document.querySelector(".answer");
const countQuestionContainer = document.querySelector(".countQuestion");

const displayDatetime = document.querySelector(".datetime");

let countRestQuestion = [];

class Quizz {
   constructor(question, answer) {
      this.question = question;
      this.answer = answer;
      this.displayed = false;
   }
}

const quizzArray = [
   new Quizz(
      "Pourquoi les nameks ont la peau vertes",
      "Parce que c'est des putains d'escargot"
   ),
   new Quizz(
      "Sur une échelle de A à Z, qu'elle est la couleur préférée des habitants de Gif Sur Yvette",
      "Chapeau"
   ),
   new Quizz("Qu'est-ce que le Mont Blanc", "Un dessert à la vanille"),
   new Quizz("Pourquoi la vie", "Pourquoi la mort"),
   new Quizz(
      "Combien il y a de millisecondes écoulé depuis le 1er Janvier 1970",
      Date.now()
   ),
   new Quizz(
      "D'autre idée de question",
      "De toute façons tu peux pas en ajouter"
   ),
];

// FUNCTIONS
const displayQuestion = () => {
   let random = Math.round(Math.random() * quizzArray.length - 1);
   if (random < 0) {
      random = random + 1;
   }

   countRestQuestion = quizzArray.filter((question) => !question.displayed);

   countQuestionContainer.innerText =
      countRestQuestion.length + " questions restantes";

   if (countRestQuestion.length === 0) {
      showAnswerButton.classList.add("disabled");
      nextQuestionButton.classList.add("disabled");
      countQuestionContainer.innerText = "";
      restartButton.classList.add("active");
      return (questionContainer.innerText =
         "Désolay je n'ay plu que quaystion !");
   }

   const currentQuizz = quizzArray[random];
   if (currentQuizz.displayed) {
      return displayQuestion();
   } else {
      currentQuizz.displayed = true;
      questionContainer.innerText = currentQuizz.question + " ?";
      answerContainer.innerText = currentQuizz.answer;
      answerContainer.classList.add("hidden");
   }
};
const changeIconForAddQuestion = () => {
   if (modalContainer.classList.contains("active")) {
      addQuestionButton.innerHTML = '<i class="fas fa-minus"></i>';
   } else {
      addQuestionButton.innerHTML = '<i class="fas fa-plus"></i>';
   }
};

const refreshCurrentDatetime = () => {
   let newDate = new Date();
   let hour = newDate.getHours();
   let minutes = newDate.getMinutes();
   minutes = minutes.toString().padStart(2, "0");

   displayDatetime.innerText = hour + ":" + minutes;
};

const addQuestion = (question, answer) => {
   let newQuestion = new Quizz(question, answer);
   quizzArray.push(newQuestion);
};

const displayError = (element) => {
   element.placeholder = "Ce champs ne peut pas être vide";
   element.classList.add("error");
};

// EVENT
nextQuestionButton.addEventListener("click", () => {
   displayQuestion();
});

showAnswerButton.addEventListener("click", () => {
   if (!showAnswerButton.classList.contains("disabled")) {
      answerContainer.classList.toggle("hidden");
      if (answerContainer.classList.contains("hidden")) {
         showAnswerButton.innerText = "Voir la réponse";
      } else {
         showAnswerButton.innerText = "Cacher la réponse";
      }
   }
});

restartButton.addEventListener("click", () => {
   quizzArray.forEach((question) => (question.displayed = false));
   showAnswerButton.classList.remove("disabled");
   nextQuestionButton.classList.remove("disabled");
   restartButton.classList.remove("active");
   displayQuestion();
});

addQuestionButton.addEventListener("click", () => {
   modalContainer.classList.toggle("active");
   changeIconForAddQuestion();
});

questionModal.addEventListener("submit", (e) => {
   e.preventDefault();
   let question = e.target[0];
   let answer = e.target[1];

   if (question.value === "") {
      displayError(question);
   }
   if (answer.value === "") {
      displayError(answer);
   }
   if (question.value !== "" && answer.value !== "") {
      addQuestion(question.value, answer.value);
      modalContainer.classList.remove("active");
      countQuestionContainer.innerText =
         countRestQuestion.length + 1 + " questions restantes";
      e.target[0].value = "";
      e.target[1].value = "";
      changeIconForAddQuestion();
   }
});

document.addEventListener("click", (e) => {
   if (e.target === modalContainer) {
      modalContainer.classList.remove("active");
      changeIconForAddQuestion();
   }
});

// START
setInterval(() => {
   refreshCurrentDatetime();
}, 10000);

displayQuestion();
refreshCurrentDatetime();
