<?php

namespace App\Events;

use App\Jobs\FinishExam;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExamStarted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $exam;

    public $student;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $exam, $student ) {
        $this->exam = $exam;
        $this->student = $student;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        FinishExam::dispatch($this->exam, $this->student)
            ->delay(now()->addSeconds(20));

        return new PrivateChannel('exam.started.' . $this->exam->id);
    }
}


/*document.getElementById('submit-teacher').addEventListener('click', () => {
    testoCreator()
})


function testoCreator(){

    var data =  $('#test-form').serializeArray();
    // console.log(data)
    var testo = {
        name: '',
        time: null,
        questions: []
    }//new Map();
    for(var i=0;i<data.length;i++){
        // console.log(data[i]['value'] )
        if(data[i]['name']==="testName"){
            testo.name = data[i]['value']
            testo.time = data[++i]['value']
        }

        else if(data[i]['name']==="DrawQuestion"){
            var odpo= {
                question:""+data[i]['value']+"",
                points:""+data[++i]['value']+"",
                type:"draw"
            }
            testo.questions.push(odpo)
        }
        else if(data[i]['name']==="ShortQuestion"){
            var odpo= {
                question:""+data[i]['value']+"",
                points:""+data[++i]['value']+"",
                answer:""+data[++i]['value']+"",
                type:"short"

            }
            testo.questions.push(odpo)
        }
        else if(data[i]['name']==="MultipleChoiceQuestion"){
            var question = {}
            question["question"]=data[i]['value']
            question["points"]=data[++i]['value']
            question["type"]="multiple"
            i++
            var answers =[]
            while(data[i] && (data[i]['name']==="Wrong Answer"|| data[i]['name']==="Right Answer")){
                var answer= {}
                if(data[i]['name']==="Wrong Answer"){
                    answer['type']="false"
                }
                else{
                    answer['type']="true"

                }

                answer['answer'] = data[i]['value']

                answers.push(answer);
                i++
            }
            question["Answers"]=answers
            testo.questions.push(question)
            i--
        }
        else if(data[i]['name']==="PairQuestion"){
            var question = {}
            question["question"]=data[i]['value']
            question["points"]=data[++i]['value']
            question["type"]="pair"
            i++
            var answersList={}
            var answers =[]
            while(data[i] && (data[i]['name']==="Pair-left"|| data[i]['name']==="Pair-right")){
                var answer={}

                answer['pair-left'] = data[i]['value']
                var o = ++i
                answer['pair-right'] = data[o]['value']
                answers.push(answer);
                i++
            }
            // answersList["Answers"]=
            question["Answers"]=answers
            testo.questions.push(question)
            i--
        }
    }

    console.log(testo)

}*/

