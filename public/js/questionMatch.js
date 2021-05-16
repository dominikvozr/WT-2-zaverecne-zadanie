var instance = [];
createPairs();
function createPairs(){
    let elems = document.getElementsByClassName('task');
    let rights=1;
    let lefts=0;


    for (let task of elems) {
        // console.log(task);
        let t = {
            id: task.getAttribute('data-id'),
            taskType: task.getAttribute('data-type'),
        }
        if (t.taskType==="pair"){
            let right = {}
            let left = {}
            var item = document.getElementById(t.id + "-pair")
            item = item.getElementsByClassName("left-wrapper")[0]
            item = item.getElementsByTagName('div')
            //id="right-item-{{$i+1}}"
            for (var i = 0; i < item.length; i++) {
                    lefts++
                    item[i].id = "left-item-" + lefts
                    // console.log(item[i].getElementsByTagName('h4')[0].textContent)
                    left[lefts] = item[i].getElementsByTagName('h4')[0].textContent.trim();
            }
            var item2 = document.getElementById(t.id + "-pair")
            item2 = item2.getElementsByClassName("right-wrapper")[0]
            item2 = item2.getElementsByTagName('div')

            for (var i = 0; i < item.length; i++) {
                lefts++
                item2[i].id = "right-item-" + lefts
                // console.log(item2[i].getElementsByTagName('h4')[0].textContent)
                right[lefts] = item2[i].getElementsByTagName('h4')[0].textContent.trim();
            }
        createConnectors(left,right)
        }
    }
}

function createConnectors(left, right){
const newJsPlumbInstance=jsPlumb.getInstance();
//getConnections
for (const item in left) {
    const id=`left-item-${item}`;
    newJsPlumbInstance.makeSource(id,{
        anchor:"Continuous",
        endpoint:["Dot", { width:5, height:5 }],
        maxConnections:1,
    })
}
for (const item in right) {
    const id=`right-item-${item}`;
    newJsPlumbInstance.makeTarget(id,{
        anchor:"Continuous",
        endpoint:["Dot", { width:5, height:5 }],
        maxConnections:1,
    })
}
    instance.push(newJsPlumbInstance);
}
