const WORK_TIME = 25 * 60; // 25 دقيقة بالثواني
let timeLeft = WORK_TIME;
let interval = null;
let isRunning = false;
let hiddenAlerted = false;

const $ = id => document.getElementById(id);
const setup = $('setup'), session = $('session'), report = $('report');

function loadData(){
  const data = JSON.parse(localStorage.getItem('tarkeez') || '{"sessions":0,"hours":0}');
  $('totalSessions').textContent = data.sessions;
  $('totalHours').textContent = data.hours.toFixed(1);
  return data;
}
function saveData(data){
  localStorage.setItem('tarkeez', JSON.stringify(data));
}

function format(sec){
  const m = String(Math.floor(sec/60)).padStart(2,'0');
  const s = String(sec%60).padStart(2,'0');
  return `${m}:${s}`;
}

function show(el){
  [setup,session,report].forEach(x=>x.classList.add('hidden'));
  el.classList.remove('hidden');
}

function growTree(){
  const tree = $('tree');
  if(timeLeft <= WORK_TIME*0.3) tree.textContent = '🌿';
  if(timeLeft <= WORK_TIME*0.1) tree.textContent = '🌳';
  tree.classList.add('grow');
  setTimeout(()=>tree.classList.remove('grow'),300);
}

$('startBtn').onclick = () =>{
  const subject = $('subject').value.trim();
  if(!subject){ alert('اكتبي اسم المادة أول'); return; }
  $('currentSubject').textContent = subject;
  timeLeft = WORK_TIME;
  hiddenAlerted = false;
  $('alert').classList.add('hidden');
  $('tree').textContent = '🌱';
  isRunning = true;
  show(session);
  interval = setInterval(()=>{
    timeLeft--;
    $('timer').textContent = format(timeLeft);
    growTree();
    if(timeLeft <= 0){
      clearInterval(interval);
      finishSession(subject);
    }
  },1000);
};

$('stopBtn').onclick = () =>{
  if(timeLeft > 0 && !confirm('متأكدة؟ الجلسة ما حتتحسب كاملة')) return;
  clearInterval(interval);
  finishSession($('currentSubject').textContent, true);
};

$('cancelBtn').onclick = () =>{
  clearInterval(interval);
  isRunning = false;
  show(setup);
};