if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

function addTask(ev) {
    ev.style.display = "none";

    let form = document.createElement("form");
    form.method = "post";
    let input = document.createElement("input");
    input.type = "text";
    input.name = "newTask";
    input.classList.add("newTask");
    input.placeholder = "Add new task";
    let submit = document.createElement("input");
    submit.type = "submit";
    submit.name = "submit";
    submit.classList.add("submit");

    form.innerHTML += input.outerHTML + submit.outerHTML;
    document.querySelector(".container").appendChild(form);
}


function editTask(ev) {
    let grandParentDiv = ev.parentNode.parentNode.childNodes;
    let parentDiv = ev.parentNode;
    let nextSibling = ev.nextElementSibling;
    let prevSibling = ev.previousElementSibling;
    let task = grandParentDiv[1].innerHTML;
    ev.style.display = "none";
    prevSibling.style.display = "none";
    nextSibling.style.display = "none";

    let input = document.createElement("input");
    input.type = "text";
    input.name = "editTask";
    input.placeholder = `${task}`;
    input.classList.add("newTask");

    grandParentDiv[1].style.display = "none";

    let submit = document.createElement("input");
    submit.type = "submit";
    submit.name = "edit";
    submit.classList.add("submit");



    parentDiv.innerHTML += input.outerHTML + submit.outerHTML ;
}

