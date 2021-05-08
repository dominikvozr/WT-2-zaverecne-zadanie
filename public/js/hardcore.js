/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/hardcore.js ***!
  \**********************************/
var test = [];
var multiCount = 0;
var shortCount = 0;
var pairCount = 0;
var drawCount = 0; //Ovladanie menu

function showMenu() {
  document.getElementById("sidebar").style.display = "block";
}

function closeSideBar() {
  document.getElementById("sidebar").style.display = "none";
} //prepinane loginov


function swtichOption(selected, not) {
  var selectedSwitch = document.getElementById(selected);
  var notSwitch = document.getElementById(not);
  var selectOption = document.getElementById(selected + "-option");
  var notOption = document.getElementById(not + "-option");
  notOption.style.display = 'none';
  selectOption.style.display = 'block';
  notSwitch.classList.remove('selected');
  notSwitch.classList.add('not-selected');
  selectedSwitch.classList.remove('not-selected');
  selectedSwitch.classList.add('selected');
}

function addTest() {
  document.getElementById('bar-chosser-choice').style.display = "block";
  document.getElementById('bar-form').style.display = "block";
  document.getElementById("bar-creator").style.borderTop = "2px solid #283444";
  multipleAnswersQuestionCreator();
}

function editExampleQuestion() {
  var hodnota = document.getElementById("newQuestion").value; // console.log(hodnota)

  switch (parseInt(hodnota)) {
    case 0:
      multipleAnswersQuestionCreator();
      break;

    case 1:
      shortAnswersQuestionCreator();
      break;

    case 2:
      pairAnswersQuestionCreator();
      break;

    case 3:
      drawAnswersQuestionCreator();
      break;

    case 4:
      mathAnswersQuestionCreator();
      break;
  }
} //pridavanie iba typu


function createDivForm() {
  var div = document.createElement("div");
  div.classList.add("form-group");
  return div;
}

function createDiv(clasa) {
  var div = document.createElement("div");
  div.classList.add(clasa);
  return div;
}

function createDiv2(clasa, clasa2) {
  var div = document.createElement("div");
  div.classList.add(clasa);
  div.classList.add(clasa2);
  return div;
}

function createInlineCol(obj0, obj1) {
  var form = createDiv("form-row");
  form.classList.add("row-margin");
  var col = createDiv("col");
  col.classList.add("form-pair");
  var col2 = createDiv("col");
  col2.classList.add("form-pair");
  var formGroup = createDiv("form-group");
  var formGroup2 = createDiv("form-group");
  formGroup.appendChild(obj0);
  col.appendChild(formGroup);
  form.appendChild(col);
  formGroup2.appendChild(obj1);
  col2.appendChild(formGroup2);
  form.appendChild(col2);
  return form;
} // function createAddButton(funkcia,meno){
//     var button= document.createElement("button")
//
//     button.setAttribute("onclick",funkcia)
//     button.setAttribute("class","btn btn-primary")
//     button.innerHTML=meno
//     return button;
// }


function createAddButton(id, meno) {
  var button = document.createElement("button");
  button.setAttribute("class", "btn btn-primary");
  button.setAttribute("id", id);
  button.innerHTML = meno;
  return button;
}

function createNumberInput(min, max, id, place) {
  var numberAnswers = document.createElement("input");
  numberAnswers.setAttribute("type", "number");
  numberAnswers.setAttribute("min", min);
  numberAnswers.setAttribute("max", max);
  numberAnswers.setAttribute("id", id); //form-control

  numberAnswers.setAttribute("class", "form-control");
  numberAnswers.setAttribute("placeholder", place);
  return numberAnswers;
}

function createTextInput(id, place, name) {
  var textInput = document.createElement("input");
  textInput.setAttribute("type", "text");

  if (id) {
    textInput.setAttribute("id", id); //form-control
  }

  textInput.setAttribute("name", name);
  textInput.setAttribute("class", "form-control");
  textInput.setAttribute("placeholder", place);
  return textInput;
}

function createCheckBox(id, elementid) {
  var checkInput = document.createElement("input");
  checkInput.setAttribute("type", "checkbox");
  checkInput.setAttribute("id", id); //form-control

  checkInput.setAttribute("class", "form-check-input"); // checkInput.setAttribute("onclick","changeValue(`"+id+"`,`"+elementid+"`)")

  return checkInput;
}

function createLabel(id, clas, inner) {
  var label = document.createElement("label");
  label.innerText = inner;
  label.setAttribute("for", id);
  label.setAttribute("class", clas);
  return label;
} // <form class="form-inline">


function createInputGroup(input, id) {
  var group = createDiv("input-group");
  group.appendChild(input);
  var button = createRemoveButton(id);
  group.appendChild(button);
  var body = createTextInput(null, "0", "points");
  body.classList.add("points");
  var span = document.createElement("span");
  span.innerText = "points";
  span.classList.add("points-text");
  group.appendChild(body);
  group.appendChild(span);
  return group;
}

function createRow(label, input, objects, id) {
  var row = createDiv("form-row");
  var col = createDiv("col");
  var formGroup = createDiv("form-group");
  var group = createInputGroup(input, id);
  formGroup.setAttribute("id", id);
  formGroup.appendChild(label);
  formGroup.appendChild(group);

  if (objects !== null) {
    formGroup.appendChild(objects);
  }

  col.appendChild(formGroup);
  row.appendChild(col);
  return row;
}

function createRemoveButton(remove) {
  // console.log(remove)
  var div = createDiv("input-group-append"); // div.setAttribute("onclick","removeQuestion("+"'"+remove+"'"+")")

  var span = document.createElement("span");
  span.classList.add("input-group-text");
  span.classList.add(remove); // span.setAttribute('class',remove)

  span.innerText = "Remove";
  div.appendChild(span);
  return div;
} //riesenie pridavania


function multipleAnswersQuestionCreator() {
  var divko = document.getElementById("QuestionEditor");
  divko.innerHTML = ''; // var button= createAddButton("createMultipleAnswersQuestion()","Add Question")

  var button = createAddButton("MultipleAnswersQuestion", "Add Question"); // button.setAttribute("id","MultipleAnswersQuestion")

  var numberAnswers = createNumberInput("2", "4", "numberAnswers", "Number of answers");
  var row = createInlineCol(numberAnswers, button);
  divko.appendChild(row);
}

function shortAnswersQuestionCreator() {
  var divko = document.getElementById("QuestionEditor");
  divko.innerHTML = '';
  var button = createAddButton("shortAnswersQuestion", "Add Question");
  var group = createDivForm();
  group.appendChild(button);
  divko.appendChild(group);
}

function pairAnswersQuestionCreator() {
  var divko = document.getElementById("QuestionEditor");
  divko.innerHTML = '';
  var button = createAddButton("PairAnswersQuestion", "Add Question");
  var numberAnswers = createNumberInput("2", "4", "numberPairs", "Number of pairs");
  var row = createInlineCol(numberAnswers, button);
  divko.appendChild(row);
}

function drawAnswersQuestionCreator() {
  var divko = document.getElementById("QuestionEditor");
  divko.innerHTML = '';
  var button = createAddButton("DrawAnswersQuestion", "Add Question");
  var group = createDivForm();
  group.appendChild(button);
  divko.appendChild(group);
}

function mathAnswersQuestionCreator() {
  var divko = document.getElementById("QuestionEditor");
  divko.innerHTML = '';
  var button = createAddButton("MathAnswersQuestion", "Add Question");
  var group = createDivForm();
  group.appendChild(button);
  divko.appendChild(group);
} //pridavanie uz konkretnej otazky


function createMultipleAnswersQuestion() {
  var pocet = document.getElementById("numberAnswers").value;

  if (pocet > 0) {
    createQuestionMulti(pocet);
  }
}

function createShortAnswersQuestion() {
  var form = document.getElementById("questionsBody");
  var id = "short-" + shortCount;
  var input = createTextInput(id, "Write Question for One Answer", "ShortQuestion");
  var inputSizeDiv = createDiv("col-50");
  var label = createLabel(id, "", "Question for One Answer");
  var formGID = id + "-form";
  var anwerInputId = id + "answer";
  var anwerInput = createTextInput(anwerInputId, "Write Answer", "Answer");
  inputSizeDiv.appendChild(anwerInput);
  var div = createRow(label, input, inputSizeDiv, formGID);
  form.appendChild(div);
  shortCount++;
}

function createPairAnswersQuestion() {
  var pocet = document.getElementById("numberPairs").value;

  if (pocet > 0) {
    createQuestionPair(pocet);
  }
}

function createDrawAnswersQuestion() {
  var form = document.getElementById("questionsBody");
  var id = "draw-" + drawCount;
  var input = createTextInput(id, "Write Question for drawing", "DrawQuestion");
  var label = createLabel(id, "", "Question for Draw");
  var formGID = id + "-form";
  var div = createRow(label, input, null, formGID);
  form.appendChild(div);
  drawCount++;
}

function createMathAnswersQuestion() {} //tvorba elementov


function createQuestionMulti(pocet) {
  var form = document.getElementById("questionsBody");
  var id = "multi" + multiCount;
  var input = createTextInput(id, "Write Question for Multiple Answer", "MultipleChoiceQuestion");
  var label = createLabel(id, "", "Question for Multiple Answer (Select Correct Answers)");
  var formGID = id + "-form";
  var answerInputId = id + "answer-";
  var coldiv = createDiv("col-50");

  for (var i = 0; i < pocet; i++) {
    var inputSizeDiv = createDiv("form-check-inline");
    var number = parseInt(i) + 1;
    var checkbox = createCheckBox(answerInputId + i + "-check", answerInputId + i);
    var answer = createTextInput(answerInputId + i, "Write Anwer" + number, "Wrong Answer");
    inputSizeDiv.appendChild(answer);
    inputSizeDiv.appendChild(checkbox);
    coldiv.appendChild(inputSizeDiv);
  }

  var div = createRow(label, input, coldiv, formGID);
  form.appendChild(div);
  multiCount++;
}

function createQuestionPair(pocet) {
  var form = document.getElementById("questionsBody");
  var id = "pair" + pairCount;
  var input = createTextInput(id, "Write Question for Pair Answer", "PairQuestion"); // var inputSizeDiv= createDiv("col-50")

  var label = createLabel(id, "", "Question for Pair Answer");
  var answerDiv = createDiv("answers-top");
  var formGID = id + "-form";
  var anwerInputId = id + "answer-"; // inputSizeDiv.appendChild(anwerInput)

  for (var i = 0; i < pocet; i++) {
    var count = i + 1;
    var answerL = createTextInput(anwerInputId + i + "-left", "Answer " + count + " Left", "Pair-left");
    var answerR = createTextInput(anwerInputId + i + "-right", "Answer " + count + " Right", "Pair-right");
    var row = createInlineCol(answerL, answerR);
    answerDiv.appendChild(row);
  }

  var div = createRow(label, input, answerDiv, formGID);
  form.appendChild(div);
  pairCount++;
} //mazanie otazok


function removeQuestion(id) {
  document.getElementById(id).remove();
}

function changeValue(checkboxid, elementid) {
  var checkbox = document.getElementById(checkboxid).checked;
  var element = document.getElementById(elementid);

  if (checkbox) {
    element.setAttribute("name", "Right Answer");
  } else {
    element.setAttribute("name", "Wrong Answer");
  }
}

function log() {
  var form = document.getElementById("test-form"); // const data = JSON.stringify($("#test-form").serializeArray()) //getFromDataAsJSON(form)

  var data = $("#test-form").serializeArray();
  console.dir(data); // return data;
} //onclick eventy
//menu - sidebar


$('#btn-menu').click(function () {
  showMenu();
}); //sidebar-close

$('#sidebar-close-btn').click(function () {
  closeSideBar();
}); //tvorba otazok

$('#addTest').click(function () {
  addTest();
}); //selector na otazky

$('#newQuestion').click(function () {
  editExampleQuestion();
});
$('#newQuestion').change(function () {
  editExampleQuestion();
});

if (document.getElementById("bar-chosser")) {
  document.querySelector('#bar-chosser').addEventListener('click', function (e) {
    if (e.target.id === 'MultipleAnswersQuestion') {
      createMultipleAnswersQuestion();
    } else if (e.target.id === 'shortAnswersQuestion') {
      createShortAnswersQuestion();
    } else if (e.target.id === 'PairAnswersQuestion') {
      createPairAnswersQuestion();
    } else if (e.target.id === 'DrawAnswersQuestion') {
      createDrawAnswersQuestion();
    }
  }); //remove button

  document.querySelector('#bar-creator').addEventListener('click', function (e) {
    //e.target.className.includes('remove')
    if (e.target.innerText === 'Remove') {
      var id = e.target.className.split(" ");
      removeQuestion(id[1]);
    }
  }); //checkbox

  document.querySelector('#bar-creator').addEventListener('click', function (e) {
    //e.target.className.includes('remove')
    // console.log(e.target.type)
    if (e.target.type === 'checkbox') {
      var inputId = e.target.id.replace("-check", "");
      changeValue(e.target.id, inputId);
    }
  });
}
if(document.getElementById('submit-teacher')){
    document.getElementById('submit-teacher').addEventListener('click', function () {
        testoCreator();
    });
}


function testoCreator() {
  var data = $('#test-form').serializeArray(); // console.log(data)

  var testo = {
    name: '',
    time: null,
    questions: []
  }; //new Map();

  for (var i = 0; i < data.length; i++) {
    // console.log(data[i]['value'] )
    if (data[i]['name'] === "testName") {
      testo.name = data[i]['value'];
      testo.time = data[++i]['value'];
    } else if (data[i]['name'] === "DrawQuestion") {
      var odpo = {
        question: "" + data[i]['value'] + "",
        points: "" + data[++i]['value'] + "",
        type: "draw"
      };
      testo.questions.push(odpo);
    } else if (data[i]['name'] === "ShortQuestion") {
      var odpo = {
        question: "" + data[i]['value'] + "",
        points: "" + data[++i]['value'] + "",
        answer: "" + data[++i]['value'] + "",
        type: "short"
      };
      testo.questions.push(odpo);
    } else if (data[i]['name'] === "MultipleChoiceQuestion") {
      var question = {};
      question["question"] = data[i]['value'];
      question["points"] = data[++i]['value'];
      question["type"] = "multiple";
      i++;
      var answers = [];

      while (data[i] && (data[i]['name'] === "Wrong Answer" || data[i]['name'] === "Right Answer")) {
        var answer = {};

        if (data[i]['name'] === "Wrong Answer") {
          answer['type'] = "false";
        } else {
          answer['type'] = "true";
        }

        answer['answer'] = data[i]['value'];
        answers.push(answer);
        i++;
      }

      question["Answers"] = answers;
      testo.questions.push(question);
      i--;
    } else if (data[i]['name'] === "PairQuestion") {
      var question = {};
      question["question"] = data[i]['value'];
      question["points"] = data[++i]['value'];
      question["type"] = "pair";
      i++;
      var answersList = {};
      var answers = [];

      while (data[i] && (data[i]['name'] === "Pair-left" || data[i]['name'] === "Pair-right")) {
        var answer = {};
        answer['pair-left'] = data[i]['value'];
        var o = ++i;
        answer['pair-right'] = data[o]['value'];
        answers.push(answer);
        i++;
      } // answersList["Answers"]=


      question["Answers"] = answers;
      testo.questions.push(question);
      i--;
    }
  } //console.log(testo)


  axios.post('https://wt166.fei.stuba.sk/zaverecne_zadanie/store/test', testo).then(function (res) {
    console.log(res);
  });
}

$('#loginTeacher').click(function () {
  swtichOption('loginTeacher', 'loginStudent');
});
$('#loginStudent').click(function () {
  swtichOption('loginStudent', 'loginTeacher');
});
/******/ })()
;
