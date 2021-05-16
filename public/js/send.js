
const ref = document.getElementById('ref')

document.querySelector("#MS_submit").addEventListener("click", function(e){
    //console.log(data);
    sendData(true)
});

function sendData(submitted) {
    var answ;
    let elems = document.getElementsByClassName('task');
    let data = {
        'id':        +ref.getAttribute('ref'),
        'submitted': submitted,
        'tasks':     [],
    }
    var r = 0;
    for (let task of elems) {

        let t = {
            id: task.getAttribute('data-id'),
            taskType:task.getAttribute('data-type'),
        }

        //console.log(t)
        switch(t.taskType) {
            case 'short':
                data.tasks.push(getOneChoice(t.id,t.taskType))
                break;
            case 'multiple':
                data.tasks.push(getMultiChoice(task,t.id,t.taskType))
                break;
            case 'pair':
                data.tasks.push(getMatchCombination(task,t.id,t.taskType, r))
                r++
                break;
            case 'draw':
                data.tasks.push(getImage(task,t.id,t.taskType))
                break;
            default:
            //console.log("avvaa")
        }
    }

    console.log(data);
    axios.post('https://wt166.fei.stuba.sk/zaverecne_zadanie/store/exam', data)
        .then(res => {
            console.log(res)
            if (res.status === 200)
                location.replace("https://wt166.fei.stuba.sk/zaverecne_zadanie/login");
        })

}

function getOneChoice(id,type){
    var oneChoiceAnswer = [];
    item = document.getElementById("answer-" + id).value;
    return {
        taskId: +id,
        taskType: type,
        answers: item

    };
}

function getMultiChoice(task,id,type){
    var elm = {};
    var answers = {};
    var elms = task.getElementsByTagName("section");
    elms = elms[0].getElementsByTagName("div")

    for (var i = 0; i < elms.length; i++) {
        /*if(elm = elms[i].getElementsByTagName('input')[0].checked){
            answers.push(elms[i].getElementsByTagName('input')[0].id);
        }*/
        let multiInput = elms[i].getElementsByTagName('input')[0];


        answers[+multiInput.id] = {
            'id':      +multiInput.id,
            'value':   multiInput.nextElementSibling.innerHTML,
            'checked': multiInput.checked,
        }
    }

    //console.log(answers)
    return {
        taskId: +id,
        taskType: type,
        answers: answers

    };
}

function getImage(task,id,type){
    var item =  document.getElementById("upload" + id);
    var src = item.src

    return {
        taskId: +id,
        taskType: type,
        answers: src

    };
}
// ypGKFTNCf1
function getMatchCombination(task,id,type,r){
    var allConnections = instance[r].getConnections();
    var answers = [];
    for (var i = 0; i < allConnections.length; i++) {
        var target = allConnections[i].targetId;
        var source = allConnections[i].sourceId;
        var pair1 = document.getElementById(source).getElementsByTagName("h4")[0].textContent.trim();
        var pair2 = document.getElementById(target).getElementsByTagName("h4")[0].textContent.trim();
        answers.push([pair1, pair2]);
    }
    return {
        taskId: +id,
        taskType: type,
        answers: answers

    };
}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        if (minutes<5){
            document.getElementById("MS_timer").style.color = 'red';
        }else{
            document.getElementById("MS_timer").style.color = 'green';
        }
        // if (timer>0) {
            display.textContent = minutes + ":" + seconds;
        // }
       if (--timer < 0) {
           // document.getElementById("MS_submit").click();
            display.textContent = 'TIME ELAPSED';
            return true;
        }
    }, 1000);
}

window.onload = function () {
    //Pusher.logToConsole = true;
    const pusher = new Pusher('8b3c6edffd569df64802', {
        cluster: 'eu',
        encrypted: true
    });

    const channel = pusher.subscribe(`exam.finished.${ref.getAttribute('ref')}`);
    to = majoJeFrajerTime;
    from = new Date().toISOString().replace("T"," ").slice(0,-5);

    from = getDateObject(from);
    from.setHours(from.getHours()+2)
    to = getDateObject(to);

    time = timeDifference(to, from)
    //console.log(to-from);

    var fiveMinutes = time;
        display = document.querySelector('#MS_timer');
    var response = startTimer(fiveMinutes, display);
    if (response==true){
        return 'elapsed';
    }

    channel.bind('exam-finished', function(data) {
        sendData(false)

        if (data.message === 'koniec skusky') {
            channel.disconnect()
        }
    });

};

function getDateObject(datestr) {
    var parts = datestr.split(' ');
    var dateparts = parts[0].split('-');
    var day = dateparts[2];
    var month = parseInt(dateparts[1]) ;
    var year = dateparts[0];
    var timeparts = parts[1].split(':')
    var hh = timeparts[0];
    var mm = timeparts[1];
    var ss = timeparts[2];
    var date = new Date(year, month, day, hh, mm, ss, 00);
    return date;
}


function timeDifference(date1,date2) {
    var difference = date1.getTime() - date2.getTime();

    var daysDifference = Math.floor(difference/1000/60/60/24);
    difference -= daysDifference*1000*60*60*24

    var hoursDifference = Math.floor(difference/1000/60/60);
    difference -= hoursDifference*1000*60*60

    var minutesDifference = Math.floor(difference/1000/60);
    difference -= minutesDifference*1000*60

    var secondsDifference = Math.floor(difference/1000);

    var diff = hoursDifference*60*60 + minutesDifference*60 + secondsDifference;
    return diff;
}
var a = 0;
if(a<1) {
    const onVisibilityChange = () => {
        //document.hidden ? console.log("odisiel") : console.log("prisiel");
        let message = document.hidden ? "Odisiel" : "Prisiel";
        console.log(message);
        a++;
        axios.post('https://wt166.fei.stuba.sk/zaverecne_zadanie/store/cheat',
            {message})
            .then(res => {
                //console.log(res)
            })
    }

    document.addEventListener("visibilitychange", onVisibilityChange);
}
