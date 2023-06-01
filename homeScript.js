let sectCounter = document.querySelector('#sectionCounter');
let counters = document.querySelectorAll(".content .counter");

let speed = 9000;
counters.forEach((counter, index)=>{
    function UpdateCounter(){
        const targetNumber = +counter.dataset.target;
        const initialNumber = +counter.innerText;
        const incPerCount = targetNumber / speed;
        if(initialNumber < targetNumber)
        {
            counter.innerText = Math.ceil(initialNumber + incPerCount);
            setTimeout(UpdateCounter, 40);
        }
    }
 UpdateCounter();
    
});

let CounterObserver = new IntersectionObserver(
    (entries, observer)=>{
        let [entry] = entries;
        if(!entry.isIntersecting) return;
        console.log(entry);
        let speed = 9000;
counters.forEach((counter, index)=>{
    function UpdateCounter(){
        const targetNumber = +counter.dataset.target;
        const initialNumber = +counter.innerText;
        const incPerCount = targetNumber / speed;
        if(initialNumber < targetNumber)
        {
            counter.innerText = Math.ceil(initialNumber + incPerCount);
            setTimeout(UpdateCounter, 40);
        }
    }
 UpdateCounter();
    
});
    },{
    root:null,
    threshold: 0.4,
});

CounterObserver.observe(sectCounter);